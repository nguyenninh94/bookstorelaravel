
                <p class="lead" style="color:red;font-weight:bold;">Category </p>
                <div class="list-group">
                    <a href="#" class="list-group-item" style="font-weight:bold;">Truyện Trinh Thám</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Kinh Tế</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Chính Trị</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Văn Hóa</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Xã Hội</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Giáo Dục</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Công Nghệ Thông Tin</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Truyện Ma</a>
                    <a href="#" class="list-group-item" style="font-weight:bold;">Tình Cảm</a>
                </div>

                <p class="lead" style="color:red;font-weight:bold;">Authors </p>
                <div class="list-group">
                  @foreach(App\Author::all() as $author)
                    <a href="#" class="list-group-item" style="font-weight:bold;">{{$author->name}}</a>
                  @endforeach  
                </div>


