@extends('layouts.app')

@section('content')
     <div class="row">
                  @forelse($books as $book)
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ url('upload/'.$book->image) }}" alt="" >
                            <div class="caption text-center">
                                <h4><a href="#">{{$book->name}}</a>
                                </h4>
                                <p>Price: {{$book->price}} VNĐ</p>
                                <p>Discount:% {{$book->discount}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <button class="btn btn-primary">AddToCart</span></button>
                                </p>
                            </div>      
                        </div> 
                    </div> 
                     @empty
                    <h3>No Books</h3>  
                  @endforelse    
    </div>
    <div class="row">
              <div class="col-md-4 col-md-offset-3">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                  </ul>
                 </nav>
              </div>
    </div>     

            <div class="row">
                <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ url('images/02.jpg') }}" alt="" >
                            <div class="caption">
                                <h4><a href="#">Title News</a>
                                </h4>
                                <p>Đây là nội dung rút gọn của bản tin</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <a href="#" class="btn btn-primary">Read more</a>
                                </p>
                            </div>      
                        </div>
                 </div>

                 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ url('images/02.jpg') }}" alt="" >
                            <div class="caption">
                                <h4><a href="#">Title News</a>
                                </h4>
                                <p>Đây là nội dung rút gọn của bản tin</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <a href="#" class="btn btn-primary">Read more</a>
                                </p>
                            </div>      
                        </div>
                 </div>

                 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ url('images/02.jpg') }}" alt="" >
                            <div class="caption">
                                <h4><a href="#">Title News</a>
                                </h4>
                                <p>Đây là nội dung rút gọn của bản tin</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <a href="#" class="btn btn-primary">Read more</a>
                                </p>
                            </div>      
                        </div>
                 </div>
            </div>
   
@endsection
