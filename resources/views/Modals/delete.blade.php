
<!-- start --- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="delateModal" tabindex="-1" role="dialog" aria-labelledby="delateLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delateLabel">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="modal-desc"></p>
            <form action=""
                  id="deleteItem"
                  method="POST"
                  role="form">
                {{ csrf_field() }}
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="serviceItem_id">
                <input type="hidden" name="service_id" value="{{$carData['serviceData']['id']}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                    <button type="submit" class="btn btn-primary" data-dismiss=""><i class="far fa-trash-alt"></i> Obrisi</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>
<!-- end --- Button trigger modal -->