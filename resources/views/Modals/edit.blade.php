{{-- Start ---Modal for edit  items in list--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=""
                  id="formEditItem"
                  method="POST"
                  role="form">
                <input type="hidden" name="service_id" value="{{$carData['serviceData']['id']}}">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name=serviceItem_id value="">
                {{ csrf_field() }}
            <div class="modal-body">

                    <label for="desc">Opis servisne stavke:</label>
                    <input name="desc"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="desc">
                    <label for="piece_price">Cena po komadu:</label>
                    <input name="piece_price"
                           type="number"
                           class="form-control"
                           autocomplete="off"
                           id="piece_price">

                    <label for="pieces">Komada:</label>
                    <input name="pieces"
                           type="number"
                           class="form-control"
                           autocomplete="off"
                           id="pieces">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                <button type="button" class="btn btn-primary"><i class="far fa-save"></i> Sacuvaj</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end ---Modal for edit items in list--}}