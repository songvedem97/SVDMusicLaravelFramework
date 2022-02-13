<?php
return[
    [
        'label'=> 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'fa-tachometer-alt'
    ],
    
    [
        'label' => 'Category Manager',
        'route' => 'category.index',
        'icon' => 'fa-stream',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Category',
                'route' => 'category.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Category',
                'route' => 'category.create',
            ]

        ]
    ],
    [
        'label' => 'Song Manager',
        'route' => 'song.index',
        'icon' => 'fa-record-vinyl',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Song',
                'route' => 'song.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Song',
                'route' => 'song.create',
            ]

        ]
    ]
    ,
    [
        'label' => 'Playlist Manager',
        'route' => 'playlist.index',
        'icon' => 'fa-music',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Playlist',
                'route' => 'playlist.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Playlist',
                'route' => 'playlist.create',
            ]

        ]
    ],
    
    [
        'label' => 'Top100 Manager',
        'route' => 'top100.index',
        'icon' => 'fa-chart-line',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Top 100',
                'route' => 'top100.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Top 100',
                'route' => 'top100.create',
            ]

        ]
    ],[
        'label' => 'Artist Manager',
        'route' => 'artist.index',
        'icon' => 'fa-user-astronaut',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Artist',
                'route' => 'artist.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Artist',
                'route' => 'artist.create',
            ]

        ]
    ],[
        'label' => 'Area Manager',
        'route' => 'area.index',
        'icon' => 'fa-globe-americas',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Area',
                'route' => 'area.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Area',
                'route' => 'area.create',
            ]

        ]
    ]
    ,[
        'label' => 'MV Manager',
        'route' => 'mv.index',
        'icon' => 'fa-film',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All MV',
                'route' => 'mv.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add MV',
                'route' => 'mv.create',
            ]

        ]
    ]
    ,[
        'label' => 'Banner Manager',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Banner',
                'route' => 'banner.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Banner',
                'route' => 'banner.create',
            ]

        ]
    ]
    ,[
        'label' => 'Account Manager',
        'route' => 'user.index',
        'icon' => 'fa-user-circle',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Account',
                'route' => 'user.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Account',
                'route' => 'user.create',
            ]

        ]
    ]
    ,[
        'label' => 'Setting',
        'route' => 'setting.index',
        'icon' => 'fas fa-cog',
        'items' => [
            [
                'icon' => 'fa-list',
                'label' => 'All Account',
                'route' => 'user.index',
            ],
            [
                'icon' => 'fa-plus-square',
                'label' => 'Add Account',
                'route' => 'user.create',
            ]

        ]
    ]
    
]

?>