<div class="modal fade" id="new-book" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/" method="post">
            <div class="modal-header">
                <h5 class="modal-title">Pridať novú knihu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="new-book-name">Názov</label>
                <input class="form-control" id="new-book-name" placeholder="Meno knihy" type="text" name="title"/>

                <label for="new-book-author">Autor</label>
                <input class="form-control" id="new-book-author" placeholder="Autor" type="text" name="author"/>

                <label for="new-book-date">Dátum vydania</label>
                <input class="form-control" id="new-book-date" placeholder="Dátum vydania" type="date" name="publish_date"/>

                <label for="new-book-price">Cena (€)</label>
                <input class="form-control" id="new-book-price" placeholder="Cena (€)" type="number" name="price"/>

                <label for="new-book-cover">Obal knihy</label>
                <input class="form-control" id="new-book-cover" type="file" name="img_path"/>

                <label for="new-book-description">Popis</label>
                <textarea class="form-control" id="new-book-description" placeholder="Popis" type="text" rows="5" name="description"></textarea>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Pridať knihu"/>
            </div>
        </form>
    </div>
</div>
