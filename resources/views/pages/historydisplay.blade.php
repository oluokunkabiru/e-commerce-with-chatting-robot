

    <div class="card-body show collapse" >
        @if ($status->status=='Pending')
            <h3 class="text-center text-danger font-weight-bold m-2">{{ $status->status }}</h3>
        @else
        <h3 class="text-center text-success font-weight-bold m-2 ">{{ $status->status }}</h3>

        @endif
        <table class="table table-hover table-responsive table-borderless">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Deliver Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_amount=0;
                @endphp
                @foreach ($history as $item)
                <tr>
                    <td><img src="{{ url($item->picture?$item->picture->file:"") }}" alt="{{ $item->product_name }}" style="width: 100px"></td>
                    <td>{{ $item->product_name }}</td>
                    <td><span class="fa">&#8358;</span> {{ $item->billing_price}}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><span class="fa">&#8358;</span> {{ $item->billing_total_price }}</td>
                    <td>
                        @if ($item->status=="Pending")
                            <span class="btn btn-danger">Pending</span>
                        @elseif ($item->status=="Processing")
                            <span class="btn btn-info">Processing <span class="spinner-grow text-white"></span></span>
                        @else
                            <span class="btn btn-success">Delivered</span>
                        @endif
                    </td>
                    @php
                        $total_amount+=$item->billing_total_price;
                    @endphp
                </tr>
                @endforeach

            </tbody>
        </table>
            <h2 class="m-4 font-weight-bold">Total Amount : <span class="fa">&#8358;</span> {{ $total_amount }} </h2>

    </div>


