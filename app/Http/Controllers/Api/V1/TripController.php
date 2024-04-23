<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use App\Models\Profile;
use App\Models\Tag;
use Illuminate\Http\Request;
use \App\Models\Destination;
use Illuminate\Support\Facades\App;
use App\Models\Proposal;

class TripController extends Controller
{
    //

    public function TripRequest(TripRequest $request)
    {
        $userRole = $request->user()->role;

        if ($userRole != 'user') {
            return response()->json([
                'status' => 'error',
                'message' => 'Only Travels can submit a trip request'
            ], 401);
        }

        $adults = $request->adults;
        $children = $request->children;
        $pets = $request->pets;
        $origin = $request->origin;

        $destination = json_decode($request->destination);
        //dd($request->user()->profile);
        $tripRequest = $request->user()->profile->tripRequests()->create([
            'adults' => $adults,
            'children' => $children,
            'pets' => $pets,
            'origin' => $origin,
            'status' => 'pending'
        ]);


        foreach ($destination as $dest) {
            $tripRequest->tripRequestMeta()->create([
                'destination' => $dest->destination,
                'arrival_date' => $dest->arrival_date,
                'departure_date' => $dest->departure_date,
            ]);
        }

        $proposals = $this->getProposal($tripRequest->id);

        $proposalSaved = $this->saveProposa($proposals, $tripRequest->id);
        //save proposals to the database

        return response()->json([
            'status' => 'success',
            'trip_request_id' => $tripRequest->id,
            'proposal_id' => $proposalSaved,
            'proposals' => $proposals,
            'message' => 'Trip request submitted successfully'
        ]);
    }

    public function getProposal($tripRequestId)
    {
        //get trip request meta data by trip request id

        $tripRequestMeta = \App\Models\TripRequestMeta::where('trip_request_id', $tripRequestId)->get();
        $profileID = App::make('auth')->user()->profile->id;

        //get tags by profile id 
        $tags = Profile::find($profileID)->tags->pluck('id')->toArray();
        $destinationArr = [];

        foreach ($tripRequestMeta as $key => $tripRequest) {
            $destination = $tripRequest->destination;
            $arrivalDate = $tripRequest->arrival_date;
            $departureDate = $tripRequest->departure_date;

            $destination = explode(',', $destination);
            $destination = array_map('trim', $destination);

            if (count($destination) === 3) {

                $destinationPlaces = $this->getDestinationByLocation($destination[0], $destination[1], $destination[2]);
            } else {
                $destinationPlaces = $this->getDestinationByLocation('', $destination[0], $destination[1]);
            }


            $Hotels = [];
            $Restaurants = [];
            $Tours = [];

            foreach ($destinationPlaces as $dest) {


                switch ($dest->type) {
                    case 'hotel':
                        array_push($Hotels, $dest);

                        break;
                    case 'restaurant':
                        array_push($Restaurants, $dest);
                        break;
                    case 'tour':
                        array_push($Tours, $dest);
                        break;
                }
            }

            foreach ($Hotels as $hotel) {

                $hotel->tags = $hotel->tags->pluck('id')->toArray();
                $hotel->tags = array_intersect($tags, $hotel->tags);
                //get the count of the tags
                $hotel->tags_count = count($hotel->tags);
            }

            //sort the hotels by tags count
            usort($Hotels, function ($a, $b) {
                return $b->tags_count - $a->tags_count;
            });

            foreach ($Restaurants as $restaurant) {

                $restaurant->tags = $restaurant->tags->pluck('id')->toArray();
                $restaurant->tags = array_intersect($tags, $restaurant->tags);
                //get the count of the tags
                $restaurant->tags_count = count($restaurant->tags);
            }

            //sort the restaurants by tags count
            usort($Restaurants, function ($a, $b) {
                return $b->tags_count - $a->tags_count;
            });

            foreach ($Tours as $tour) {

                $tour->tags = $tour->tags->pluck('id')->toArray();
                $tour->tags = array_intersect($tags, $tour->tags);
                //get the count of the tags
                $tour->tags_count = count($tour->tags);
            }

            //sort the tours by tags count
            usort($Tours, function ($a, $b) {
                return $b->tags_count - $a->tags_count;
            });




            $destinationArr[] = [
                'arrival_date' => $arrivalDate,
                'departure_date' => $departureDate,
                'city' => $destination[0],
                'state' => $destination[1],
                'country' => $destination[2],
                'hotels' => $Hotels,
                'restaurants' => $Restaurants,
                'tours' => $Tours
            ];
        }




        return $destinationArr;
    }

    public function getDestinationByLocation($city, $state, $country)
    {

        if ($city === '') {
            $destination = Destination::where('state', $state)
                ->where('country', $country)
                ->get();
            return $destination;
        } else {

            $destination = Destination::where('city', $city)
                ->where('state', $state)
                ->where('country', $country)
                ->get();
        }

        return $destination;
    }

    public function saveProposa($proposalDetail, $tripRequestId)
    {


        $profileID = App::make('auth')->user()->profile->id;
        $proposalModel = Proposal::create([
            'profile_id' => $profileID,
            'trip_request_id' => $tripRequestId,
            'status' => 'pending'
        ]);

        foreach ($proposalDetail as $proposal) {
            $arrDestination = [];


            foreach ($proposal['hotels'] as $hotel) {
                array_push($arrDestination, $hotel->id);
            }
            foreach ($proposal['restaurants'] as $restaurant) {
                array_push($arrDestination, $restaurant->id);
            }
            foreach ($proposal['tours'] as $tour) {
                array_push($arrDestination, $tour->id);
            }
            $proposalMeta =  $proposalModel->proposalMeta()->create([
                'destination' => $proposal['city'] . ', ' . $proposal['state'] . ', ' . $proposal['country'],
                'arrival_date' => $proposal['arrival_date'],
                'departure_date' => $proposal['departure_date'],
            ]);



            $proposalMeta->destinations()->attach($arrDestination);
        }


        return $proposalModel->id;
    }

    public function trip(Request $request)
    {



        $profileID = App::make('auth')->user()->profile->id;
        $tripRequestID = $request->trip_request_id;
        $proposalID = $request->proposal_id;
        $destinations = json_decode($request->destinations);

        $trip = \App\Models\Trip::create([
            'profile_id' => $profileID,
            'trip_request_id' => $tripRequestID,
            'proposal_id' => $proposalID,
            'origin' => $request->origin,
            'adults' => $request->adults,
            'children' => $request->children,
            'pets' => $request->pets,
            'status' => 'pending'
        ]);


        foreach ($destinations as $destination) {
            $tipMeta = $trip->metas()->create([
                'destination' => $destination->destination,
                'arrival_date' => $destination->arrival_date,
                'departure_date' => $destination->departure_date,
            ]);

            $hotel = [$destination->hotel];
            $restaurant = $destination->restaurant;
            $tour = $destination->tour;

            $allplaces = array_merge($hotel, $restaurant, $tour);

            $tipMeta->destinations()->attach($allplaces);
        }



        return response()->json([
            'status' => 'success',
            'message' => 'Trip approved successfully',
            'trip_id' => $trip->id,

        ]);
    }
}
