<div class="panel-body">
<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <td><strong>Opis</strong></td>
            <td class="text-center"><strong>Cena kom.</strong></td>
            <td class="text-center"><strong>Komada</strong></td>
            <td class="text-center"><strong>PDV</strong></td>
            <td class="text-right"><strong>Ukupno</strong></td>
            <td class="text-right"><strong>Edit</strong></td>
        </tr>
        </thead>
        <tbody>
        @if (count($carData['serviceItems']))
            @foreach( $carData['serviceItems'] as $serviceItem)
                <tr>
                    <td>{{$serviceItem['desc']}}</td>
                    <td class="text-center">{{$serviceItem['piece_price']}}</td>
                    <td class="text-center">{{$serviceItem['pieces']}}</td>
                    <td class="text-center">{{$serviceItem['pdv']}}</td>
                    <td class="text-right"><strong>{{$serviceItem['total']}}</strong>
                    </td>
                    <td class="text-right">
                        <span style="color: green"
                              data-id="{{$serviceItem['id']}}"
                              data-toggle="modal"
                              data-target="#editModal"
                              data-desc="{{$serviceItem['desc']}}"
                              data-piece_price="{{$serviceItem['piece_price']}}"
                              data-pieces="{{$serviceItem['pieces']}}"
                              data-title="Edit: {{$serviceItem['desc']}}">
                         <i class="far fa-edit"></i></span>
                        <strong>/</strong>
                        <span style="color: red"
                              data-id="{{$serviceItem['id']}}"
                              data-toggle="modal"
                              data-target="#delateModal"
                              data-whatever="{{$serviceItem['id']}}"
                              data-title="Paznja brisanje stavke!"
                              data-desc="{{$serviceItem['desc']}}">
                        <i class="far fa-trash-alt"></i></span>
                    </td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow text-right"><strong>Osnovica</strong></td>
            <td class="highrow text-right">$958.00</td>
        </tr>
        <tr>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow text-right"><strong>PDV</strong></td>
            <td class="emptyrow text-right">$20</td>
        </tr>
        <tr>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow text-right"><strong>Ukupno sa PDV</strong></td>
            <td class="emptyrow text-right">{{$carData['totalSum']}}</td>
        </tr>
        </tbody>
    </table>
</div>
</div>