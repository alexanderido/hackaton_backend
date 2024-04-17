export const arrendpoint = [
    {
        name: "User",
        endpoints: [
            {
                endpoint: "register",
                method: "POST",
                scope: "public",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "email",
                        type: "email",
                        required: true,
                    },
                    {
                        name: "password",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "password_confirmation",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "role",
                        type: "string (agency, user)",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "login",
                method: "POST",
                scope: "public",
                interface: [
                    {
                        name: "email",
                        type: "email",
                        required: true,
                    },
                    {
                        name: "password",
                        type: "string",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "logout",
                method: "POST",
                scope: "private",
            },
        ],
    },
    {
        name: "Tags",
        endpoints: [
            {
                endpoint: "tags",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "tags/10",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "tags",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "icon",
                        type: "string",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "tags/12",
                method: "DELETE",
                scope: "private",
            },
        ],
    },
    {
        name: "Agencies",
        endpoints: [
            {
                endpoint: "agencies",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "agencies/{id}",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "agencies/{id}",
                method: "PUT",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "name_juridical",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "cover",
                        type: "file",
                        required: true,
                    },
                    {
                        name: "bio",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "logo",
                        type: "file",
                        required: true,
                    },
                    {
                        name: "cedula",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "phone_number",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "address",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "email",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "bank_account",
                        type: "string",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "agencies",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "name_juridical",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "cover",
                        type: "file",
                        required: true,
                    },
                    {
                        name: "bio",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "logo",
                        type: "file",
                        required: true,
                    },
                    {
                        name: "cedula",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "phone_number",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "address",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "email",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "bank_account",
                        type: "string",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "agencies/12",
                method: "DELETE",
                scope: "private",
            },
        ],
    },
    {
        name: "Destinations",
        endpoints: [
            {
                endpoint: "destinations",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "destinations/{id}",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "destinations",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "description",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "location",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "cover",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "address",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "logo",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "phone_number",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "city",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "state",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "country",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "type",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "category",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "status",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "age_restriction",
                        type: "number",
                        required: false,
                    },
                ],
            },
            {
                endpoint: "destinations/{id}",
                method: "PUT",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "description",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "location",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "cover",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "address",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "logo",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "phone_number",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "city",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "state",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "country",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "type",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "category",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "status",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "age_restriction",
                        type: "number",
                        required: false,
                    },
                ],
            },
            {
                endpoint: "destinations/{id}",
                method: "DELETE",
                scope: "private",
            },
            {
                endpoint: "destinations/{id}/tagas",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "tags",
                        type: "number[]",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "destinations/{id}/prices",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "date",
                        type: "date",
                        required: true,
                    },
                ],
            },
            {
                endpoint: "destinations/{id}/prices",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "destinations/{id}/addGallery",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "images[]",
                        type: "file[]",
                        required: true,
                    },
                ],
            },
        ],
    },
    {
        name: "Profiles",
        endpoints: [
            {
                endpoint: "profiles",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "profiles/10",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "profiles/10",
                method: "DELETE",
                scope: "private",
            },
            {
                endpoint: "profiles",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "nationality",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "date_of_birth",
                        type: "date",
                        required: true,
                    },
                    {
                        name: "photo",
                        type: "file",
                        required: false,
                    },
                ],
            },
            {
                endpoint: "profiles/1",
                method: "PUT",
                scope: "private",
                interface: [
                    {
                        name: "name",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "nationality",
                        type: "string",
                        required: false,
                    },
                    {
                        name: "date_of_birth",
                        type: "date",
                        required: false,
                    },
                    {
                        name: "photo",
                        type: "file",
                        required: false,
                    },
                ],
            },
            {
                endpoint: "profiles/{id}/tags",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "tags",
                        type: "number[]",
                        required: true,
                    },
                ],
            },
        ],
    },
    {
        name: "Trip Requests",
        endpoints: [
            {
                endpoint: "trip-request",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "adults",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "children",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "pets",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "origin",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "destination",
                        type: "json",
                        required: false,
                    },
                ],
            },
            {
                endpoint: "trip",
                method: "POST",
                scope: "private",
                interface: [
                    {
                        name: "trip_request_id",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "proposal_id",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "adults",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "children",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "pets",
                        type: "number",
                        required: true,
                    },
                    {
                        name: "origin",
                        type: "string",
                        required: true,
                    },
                    {
                        name: "destination",
                        type: "json",
                        required: false,
                    },
                ],
            },
        ],
    },
];
