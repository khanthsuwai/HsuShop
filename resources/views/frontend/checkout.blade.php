@extends('layouts.frontend')
@section('content')
    <section class="container py-5">
        <h3 class="text-center py-5">My Shopping Cart</h3>
        <div class="table-reponsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Code-No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="itemTbody">

                </tbody>
            </table>
        </div>

        <div class="d-grid gap-2">
            @if (Auth::user() && Auth::user()->role == 'User')
                <form class="row" id="paymentForm" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="paymentSlip">PaymentSlip</label>
                        <input type="file" name="paymentSlip" id="paymentSlip" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label for="paymentMethod">PaymentMethod</label>
                        <select class="form-select" name="paymentMethod" id="paymentMethod">
                            <option value="">Choose Payment Method</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success my-5" id="orderNow">Order Now</button>
                </form>
            @elseif (Auth::user() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'Super Admin'))
                <p class="text-center text-danger">Super Admin and Admin not Order.</p>
            @else
                <a href="/login" class="btn btn-primary">Login</a>
            @endif
        </div>

    </section>

    {{-- Order Success Modal --}}
    <div class="modal" tabindex="-1" id="orderSuccessModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h1 class="text-success fs-1"><i class="bi bi-check-circle"></i></h1>
                        <p>Your order is successful.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/" class="btn btn-success">Ok</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // alert('hello');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('#orderNow').click(function() {
            //     let itemString = localStorage.getItem('shops');
            //     if (itemString) {
            //         // $.post(url,data,callback function)
            //         $.post("{{ route('orderNow') }}", {
            //             data: itemString
            //         }, function(res) {
            //             console.log(res);
            //         })
            //     }
            // })

            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();
                // alert('hello');
                let itemString = localStorage.getItem('shops');
                let formData = new FormData(this);
                // console.log(itemString, formData);
                formData.append('orderItems', itemString);

                $.ajax({
                    type: "POST",
                    url: "{{ route('orderNow') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            $('#orderSuccessModal').modal('show');
                            localStorage.removeItem('shops');
                        }
                    }
                });

            })


        });
    </script>
@endsection
