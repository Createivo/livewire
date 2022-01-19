


## Pagination

#### in app livewire class [ posts ]:

1 - i remove `public $posts`  [ _disabled because we pass the data in render method_ ]

2 - added use `WithPagination` trait
<br>
protected `$paginationTheme` = 'bootstrap'


#### in the livewire blade [ posts ]:
add {{$posts -> links()}}
