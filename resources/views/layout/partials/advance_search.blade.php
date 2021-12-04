<div class="modal fade" id="advanced-search" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route("search.store") }}" method="POST" id="advanced-search-form">
        @csrf <!-- {{ csrf_field() }} -->
            <div class="modal-header">
                <h5 class="modal-title">Vyhľadávanie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="tittle">Názov knihy</label>
                <input name="tittle" class="form-control" id="tittle" placeholder="Názov knihy" type="text"/>

                <label for="author">Autor knihy</label>
                <input name="author" class="form-control" id="author" placeholder="Autor knihy" type="text"/>

                <label for="maxprice">Maximálna cena</label>
                <input name="maxprice" class="form-control" id="maxprice" placeholder="Maximálna cena" type="number"/>

                <label for="category">Kategória</label>
                <select name="category" id="category" class="form-select">
                    <option value="">Vybrať kategóriu</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Vyhľadať"/>
            </div>
        </form>
    </div>
</div>
