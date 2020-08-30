<div id="addContact" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="mySmallModalLabel">New Contact</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('contact.addContact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="First name" class="form-control mt-3" name="fname">
                        <input type="text" placeholder="Last name" class="form-control mt-3" name="lname">
                        <select name="company_id" class="form-control mt-3">
                            <option value="">Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" placeholder="Phone number" class="form-control mt-3" name="phone_number">
                        <input type="text" placeholder="E-Mail" class="form-control mt-3" name="email">
                        <input type="text" placeholder="Address" class="form-control mt-3" name="address">

                        <button type="submit" class="btn btn-success mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
