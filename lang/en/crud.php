<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'blog_categories' => [
        'name' => 'Blog Categories',
        'index_title' => 'BlogCategories List',
        'new_title' => 'New Blog category',
        'create_title' => 'Create BlogCategory',
        'edit_title' => 'Edit BlogCategory',
        'show_title' => 'Show BlogCategory',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'pages' => [
        'name' => 'Pages',
        'index_title' => 'Pages List',
        'new_title' => 'New Page',
        'create_title' => 'Create Page',
        'edit_title' => 'Edit Page',
        'show_title' => 'Show Page',
        'inputs' => [
            'title' => 'Title',
            'content' => 'Content',
            'tags' => 'Tags',
            'short_description' => 'Short Description',
        ],
    ],

    'faqs' => [
        'name' => 'Faqs',
        'index_title' => 'Faqs List',
        'new_title' => 'New Faq',
        'create_title' => 'Create Faq',
        'edit_title' => 'Edit Faq',
        'show_title' => 'Show Faq',
        'inputs' => [
            'question' => 'Question',
            'answer' => 'Answer',
        ],
    ],

    'social_links' => [
        'name' => 'Social Links',
        'index_title' => 'SocialLinks List',
        'new_title' => 'New Social link',
        'create_title' => 'Create SocialLink',
        'edit_title' => 'Edit SocialLink',
        'show_title' => 'Show SocialLink',
        'inputs' => [
            'name' => 'Name',
            'icon' => 'Icon',
            'link' => 'Link',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'blogs' => [
        'name' => 'Blogs',
        'index_title' => 'Blogs List',
        'new_title' => 'New Blog',
        'create_title' => 'Create Blog',
        'edit_title' => 'Edit Blog',
        'show_title' => 'Show Blog',
        'inputs' => [
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'tags' => 'Tags',
            'blog_category_id' => 'Blog Category',
        ],
    ],

    'buses' => [
        'name' => 'Buses',
        'index_title' => 'Buses List',
        'new_title' => 'New Bus',
        'create_title' => 'Create Bus',
        'edit_title' => 'Edit Bus',
        'show_title' => 'Show Bus',
        'inputs' => [
            'name' => 'Name',
            'model' => 'Model',
        ],
    ],

    'bus_routes' => [
        'name' => 'Bus Routes',
        'index_title' => 'BusRoutes List',
        'new_title' => 'New Bus route',
        'create_title' => 'Create BusRoute',
        'edit_title' => 'Edit BusRoute',
        'show_title' => 'Show BusRoute',
        'inputs' => [
            'bus_id' => 'Bus',
            'from' => 'From',
            'to' => 'To',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'seat_cost' => 'Seat Cost',
        ],
    ],

    'cars' => [
        'name' => 'Cars',
        'index_title' => 'Cars List',
        'new_title' => 'New Car',
        'create_title' => 'Create Car',
        'edit_title' => 'Edit Car',
        'show_title' => 'Show Car',
        'inputs' => [
            'car_brand_id' => 'Car Brand',
            'number' => 'Number',
            'image' => 'Image',
            'video' => 'Video',
            'car_driver_id' => 'Car Driver',
            'seat_count' => 'Seat Count',
            'cost' => 'Cost',
        ],
    ],

    'car_brands' => [
        'name' => 'Car Brands',
        'index_title' => 'CarBrands List',
        'new_title' => 'New Car brand',
        'create_title' => 'Create CarBrand',
        'edit_title' => 'Edit CarBrand',
        'show_title' => 'Show CarBrand',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'car_drivers' => [
        'name' => 'Car Drivers',
        'index_title' => 'CarDrivers List',
        'new_title' => 'New Car driver',
        'create_title' => 'Create CarDriver',
        'edit_title' => 'Edit CarDriver',
        'show_title' => 'Show CarDriver',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'cities' => [
        'name' => 'Cities',
        'index_title' => 'Cities List',
        'new_title' => 'New City',
        'create_title' => 'Create City',
        'edit_title' => 'Edit City',
        'show_title' => 'Show City',
        'inputs' => [
            'name' => 'Name',
            'image' => 'Image',
            'country_id' => 'Country',
            'description' => 'Description',
        ],
    ],

    'city_categories' => [
        'name' => 'City Categories',
        'index_title' => 'CityCategories List',
        'new_title' => 'New City category',
        'create_title' => 'Create CityCategory',
        'edit_title' => 'Edit CityCategory',
        'show_title' => 'Show CityCategory',
        'inputs' => [
            'city_id' => 'City',
        ],
    ],

    'all_city_events' => [
        'name' => 'All City Events',
        'index_title' => 'AllCityEvents List',
        'new_title' => 'New City events',
        'create_title' => 'Create CityEvents',
        'edit_title' => 'Edit CityEvents',
        'show_title' => 'Show CityEvents',
        'inputs' => [
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'event_type_id' => 'Event Type',
            'city_id' => 'City',
        ],
    ],

    'countries' => [
        'name' => 'Countries',
        'index_title' => 'Countries List',
        'new_title' => 'New Country',
        'create_title' => 'Create Country',
        'edit_title' => 'Edit Country',
        'show_title' => 'Show Country',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'destination_blogs' => [
        'name' => 'Destination Blogs',
        'index_title' => 'DestinationBlogs List',
        'new_title' => 'New Destination blog',
        'create_title' => 'Create DestinationBlog',
        'edit_title' => 'Edit DestinationBlog',
        'show_title' => 'Show DestinationBlog',
        'inputs' => [
            'image' => 'Image',
            'title' => 'Title',
            'description' => 'Description',
            'tags' => 'Tags',
            'status' => 'Status',
            'city_id' => 'City',
        ],
    ],

    'event_types' => [
        'name' => 'Event Types',
        'index_title' => 'EventTypes List',
        'new_title' => 'New Event type',
        'create_title' => 'Create EventType',
        'edit_title' => 'Edit EventType',
        'show_title' => 'Show EventType',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'holidays' => [
        'name' => 'Holidays',
        'index_title' => 'Holidays List',
        'new_title' => 'New Holiday',
        'create_title' => 'Create Holiday',
        'edit_title' => 'Edit Holiday',
        'show_title' => 'Show Holiday',
        'inputs' => [
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'cost' => 'Cost',
            'city_id' => 'City',
        ],
    ],

    'hotels' => [
        'name' => 'Hotels',
        'index_title' => 'Hotels List',
        'new_title' => 'New Hotel',
        'create_title' => 'Create Hotel',
        'edit_title' => 'Edit Hotel',
        'show_title' => 'Show Hotel',
        'inputs' => [
            'Name' => 'Name',
            'hotel_type_id' => 'Hotel Type',
        ],
    ],

    'hotel_facilities' => [
        'name' => 'Hotel Facilities',
        'index_title' => 'HotelFacilities List',
        'new_title' => 'New Hotel facility',
        'create_title' => 'Create HotelFacility',
        'edit_title' => 'Edit HotelFacility',
        'show_title' => 'Show HotelFacility',
        'inputs' => [
            'name' => 'Name',
            'hotel_id' => 'Hotel',
        ],
    ],

    'hotel_services' => [
        'name' => 'Hotel Services',
        'index_title' => 'HotelServices List',
        'new_title' => 'New Hotel service',
        'create_title' => 'Create HotelService',
        'edit_title' => 'Edit HotelService',
        'show_title' => 'Show HotelService',
        'inputs' => [
            'hotel_id' => 'Hotel',
            'name' => 'Name',
            'cost' => 'Cost',
        ],
    ],

    'hotel_types' => [
        'name' => 'Hotel Types',
        'index_title' => 'HotelTypes List',
        'new_title' => 'New Hotel type',
        'create_title' => 'Create HotelType',
        'edit_title' => 'Edit HotelType',
        'show_title' => 'Show HotelType',
        'inputs' => [
            'name' => 'Name',
            'star' => 'Star',
        ],
    ],

    'insurances' => [
        'name' => 'Insurances',
        'index_title' => 'Insurances List',
        'new_title' => 'New Insurance',
        'create_title' => 'Create Insurance',
        'edit_title' => 'Edit Insurance',
        'show_title' => 'Show Insurance',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'insurance_agency_id' => 'Insurance Agency',
        ],
    ],

    'insurance_agencies' => [
        'name' => 'Insurance Agencies',
        'index_title' => 'InsuranceAgencies List',
        'new_title' => 'New Insurance agency',
        'create_title' => 'Create InsuranceAgency',
        'edit_title' => 'Edit InsuranceAgency',
        'show_title' => 'Show InsuranceAgency',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'jobs' => [
        'name' => 'Jobs',
        'index_title' => 'Jobs List',
        'new_title' => 'New Job',
        'create_title' => 'Create Job',
        'edit_title' => 'Edit Job',
        'show_title' => 'Show Job',
        'inputs' => [
            'image' => 'Image',
            'title' => 'Title',
            'description' => 'Description',
            'job_category_id' => 'Job Category',
            'job_sub_category_id' => 'Job Sub Category',
        ],
    ],

    'job_categories' => [
        'name' => 'Job Categories',
        'index_title' => 'JobCategories List',
        'new_title' => 'New Job category',
        'create_title' => 'Create JobCategory',
        'edit_title' => 'Edit JobCategory',
        'show_title' => 'Show JobCategory',
        'inputs' => [],
    ],

    'job_sub_categories' => [
        'name' => 'Job Sub Categories',
        'index_title' => 'JobSubCategories List',
        'new_title' => 'New Job sub category',
        'create_title' => 'Create JobSubCategory',
        'edit_title' => 'Edit JobSubCategory',
        'show_title' => 'Show JobSubCategory',
        'inputs' => [],
    ],

    'settings' => [
        'name' => 'Settings',
        'index_title' => 'Settings List',
        'new_title' => 'New Setting',
        'create_title' => 'Create Setting',
        'edit_title' => 'Edit Setting',
        'show_title' => 'Show Setting',
        'inputs' => [
            'property' => 'Property',
            'value' => 'Value',
            'type' => 'Type',
            'setting_group_id' => 'Setting Group',
        ],
    ],

    'setting_groups' => [
        'name' => 'Setting Groups',
        'index_title' => 'SettingGroups List',
        'new_title' => 'New Setting group',
        'create_title' => 'Create SettingGroup',
        'edit_title' => 'Edit SettingGroup',
        'show_title' => 'Show SettingGroup',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'visas' => [
        'name' => 'Visas',
        'index_title' => 'Visas List',
        'new_title' => 'New Visa',
        'create_title' => 'Create Visa',
        'edit_title' => 'Edit Visa',
        'show_title' => 'Show Visa',
        'inputs' => [
            'country_id' => 'Country',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
