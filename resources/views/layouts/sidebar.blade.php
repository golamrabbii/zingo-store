<div class="col-lg-3 custom-margin-top">
                            <div class="product-sidebar-area pr-60">
                                <div class="sidebar-widget pb-55">
                                    <h3 class="sidebar-widget">Search Products</h3>
                                    <div class="sidebar-search">
                                        <form action="{{ url('/search') }}" method="get">
                                            <input type="text" name="search" placeholder="Search Products...">
                                            <button><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="sidebar-widget pb-50">
                                    <h3 class="sidebar-widget">by categories</h3>
                                    <div class="widget-categories">
                                        <ul>
                                        	@foreach (App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                                        		<li><a href="#main-{{ $parent->id}}" data-toggle="collapse" data-parent="#accordion" class="list-group-item list-group-item-action">{{ $parent->name }}</a></li>
                                        		<div class="panel-collapse collapse in
                                                @if (str_contains(url()->current(), '/category'))
                                                    @if (App\Category::ParentOrNotCategory($parent->id, $category->id))
                                                        show
                                                    @endif
                                                @endif
                                                " id="main-{{ $parent->id}}" style="margin-left: 30px;">
                                        			@foreach (App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
		                                        		<li style="margin-bottom: 16px;"><a style="font-size: 13px; padding-top: 5px; padding-bottom: 5px;" href="{{ url('/category/'.$child->id) }}" class="list-group-item list-group-item-action 
                                                            @if (str_contains(url()->current(), '/category'))
                                                                @if ($child->id == $category->id)
                                                                    active
                                                                @endif
                                                            @endif
                                                            ">- {{ $child->name }}</a></li>
		                                        	@endforeach
		                                        </div>
                                        	@endforeach
                                            {{-- <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Jewelry</a></li>
                                            <li><a href="#">Accessories</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">by price</h3>
                                    <div class="price_filter mr-60">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <div class="label-input">
                                                <label>price : </label>
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            </div>
                                            <button type="button">Filter</button> 
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">by color</h3>
                                    <div class="product-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="yellow">y</li>
                                            <li class="gray">g</li>
                                            <li class="puce">pu</li>
                                            <li class="black">b</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="sidebar-widget mb-45">
                                    <h3 class="sidebar-widget">product tags</h3>
                                    <div class="product-tags">
                                        <ul>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Tie</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Dress</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">compare</h3>
                                    <div class="product-compare">
                                        <ul>
                                            <li><a href="#">Gloriori GSX 250 R <span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                            <li><a href="#">Klager GSX 250 R<span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                            <li><a href="#">Maxclon ZPE 54 <span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="compare-text-btn">
                                        <div class="compare-text">
                                            <h5>Clear All</h5>
                                        </div>
                                        <div class="compare-btn">
                                            <a href="#">Compare</a>
                                        </div>
                                    </div>
                                </div> --}}
                    
                            </div>
                        </div>