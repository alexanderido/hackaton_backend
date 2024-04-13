// Generated by https://quicktype.io

export interface Profile {
  id:            number;
  user_id:       number;
  name:          string;
  nationality:   string;
  date_of_birth: string;
  photo:         string;
  tags:          ProfileTag[];
  guests:        Guest[];
}

export interface Guest {
  id:            number;
  profile_id:    number;
  name:          string;
  nationality:   string;
  date_of_birth: string;
  tags:          GuestTag[];
}

export interface GuestTag {
  id:   number;
  name: string;
  icon: string;
}

export interface ProfileTag {
  id:   number;
  name: string;
}

// Generated by https://quicktype.io

export interface ListProfiles {
  id:            number;
  name:          string;
  nationality:   string;
  date_of_birth: string;
  photo:         string;
}
