 <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="profile-pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(Auth::user()->induser_id !=null)
      {!! Form::open(array('url' => 'user/imgUpload', 'files'=> true, 'id'=> 'profile-img-upload-form')) !!}
      @elseif(Auth::user()->corpuser_id !=null)
      {!! Form::open(array('url' => 'corporate/imgUpload', 'files'=> true)) !!}
      @endif

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add profile image</h4>
      </div>
      <div class="modal-body" id="img-area">       
        {!! Form::file('profile_pic', ['class'=>'profile-image']) !!}
      </div>
      <div class="modal-footer">        
        {{-- {!! Form::submit('upload',['class'=>'btn btn-info']) !!} --}}
        <button type="button" class="btn btn-info upload-img">Upload</button>{{-- 
        <button type="button" class="btn btn-warning cropnsave-img" >Crop & Save</button> --}}

        <form action="user/imgUpload" target="_blank" method="post" id="demo8_form">
          <input type="hidden" id="crop_x" name="x"/>
          <input type="hidden" id="crop_y" name="y"/>
          <input type="hidden" id="crop_w" name="w"/>
          <input type="hidden" id="crop_h" name="h"/>
          <input type="hidden" id="fn" name="filename"/>
          <input type="submit" value="Crop & Save" class="btn btn-large green cropnsave-img" style="display:none"/>
        </form>

        <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
      </div>
      {!!Form::close() !!}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Modal</h4>
      </div>
      <div class="modal-body">
      Hi ! I am a modal.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<!-- CHANGE PASSWORD MODAL FORM-->
<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Change password</h4>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/change/password') }}">
      <div class="modal-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group" style="margin-bottom:15px">
            <label class="col-md-4 control-label">Old Password</label>
            <div class="col-md-8">
              <input type="password" class="form-control" name="old_password" required>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:15px">
            <label class="col-md-4 control-label">New Password</label>
            <div class="col-md-8">
              <input type="password" class="form-control" name="password" required>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:15px">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-8">
              <input type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success">Change</button>
        <button type="button" class="btn btn-sm default" data-dismiss="modal">Close</button>
      </div>      
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END CHANGE PASSWORD MODAL FORM -->




