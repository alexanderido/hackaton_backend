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
                endpoint: "agencies",
                method: "POST",
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
                endpoint: "destinations/10",
                method: "GET",
                scope: "private",
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
                endpoint: "profiles/1/guests",
                method: "GET",
                scope: "private",
            },
            {
                endpoint: "profiles/{id}/guests/{id}",
                method: "GET",
                scope: "private",
            },
        ],
    },
];
