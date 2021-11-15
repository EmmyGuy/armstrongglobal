
<div class="modal-body">
    <div class="top-strip"></div>
    <a class="h2"  target="_blank">Check-Out</a>
    <hr>
    <h5  >You are about to Pay for project material titled:</h5>
    <h4><p style="text-align:center" class="pb-1 text-muted" id="project-title"></h4></p>
    <form id="check-out-form" role="form" method="POST" action="{{route('pay')}}">
        <!-- <div class="input-group mb-3 w-75 mx-auto">
            <input type="email" class="form-control" placeholder="sunlimetech@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
            <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div> -->
            <input type="hidden" name="email" id="buyer-email"value=""> {{-- required --}}
            <input type="hidden" name="orderID" id="orderID" value="" >
            <input type="hidden" name="amount" value="" id="amount"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="reference" id="reference" value=""> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
    </form>
    <!-- <p class="pb-1 text-muted"><small>Your email is safe with us. We won't spam.</small></p> -->
    <div class="bottom-strip"></div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

    <button type="button" class="btn btn-success proceed-pay" data-slug="">Proceed to Pay</button>
    </div>
</div>

