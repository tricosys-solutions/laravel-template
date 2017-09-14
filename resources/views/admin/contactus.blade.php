@extends('admin.layouts.admin')
@section('content')
<div class="page-header">
    <h2>Contact Us</h2>
</div>
<div class="row">

    <div class="col-sm-7">
        <form class="form-horizontal" id="frmContactUs" method="POST" action="{{url('/admin_contact_us')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="contact">Contact:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="comment">Comment:</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-default"><i class="fa fa-save text-primary" aria-hidden="true"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h4>Head Quarters & Development Center</h4>
            <p>
                Suryakiran Flat No.5 
                Survey No. 78/2/3, Plot No.25 
                Left Bhusari Colony 
                Near Kothrud Depot 
                Pune 411038 
                Maharashtra, India
            </p>
            <p>
                Phone :- +91 20 25286066
            </p>
            <p>
                Email :- info@tricosys.com
            </p>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="col-sm-12">
        <div id="map"></div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('scripts/contactus.js')}}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Oi47roKLgfI23qii9gSpqDze7TafDWQ&callback=initMap">

</script>
@endsection