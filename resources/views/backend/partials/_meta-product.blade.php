<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$tour->title.'|'. $tour->days}} Days">
<meta itemprop="description" content="{{$tour->description}}">
<meta itemprop="image" content="{{$tour->featuredImage->thumbnail}}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="{{url()->current()}}">
<meta name="twitter:title" content="{{$tour->title.'|'. $tour->days}} Days">
<meta name="twitter:description" content="{{$tour->description}}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="{{$tour->featuredImage->thumbnail}}">
<meta name="twitter:data1" content="${{$tour->price}}">
<meta name="twitter:label1" content="Price">
<meta name="twitter:data2" content="{{$tour->category->name}}">
<meta name="twitter:label2" content="Difficulty">

<!-- Open Graph data -->
<meta property="og:title" content="{{$tour->title.'|'. $tour->days}} Days" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="{{$tour->featuredImage->thumbnail}}" />
<meta property="og:description" content="{{$tour->description}}" />
<meta property="og:site_name" content="Nepal Ski Guides" />
<meta property="og:price:amount" content="{{$tour->price}}" />
<meta property="og:price:currency" content="USD" />