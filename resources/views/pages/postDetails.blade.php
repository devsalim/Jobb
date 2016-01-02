
<div class="modal-body modal-body-new">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="portlet light bordered" style="border: none !important;background:transparent;padding:0 !important;">                                     
    <div class="portlet-body form">
        <div class="form-body" style="padding: 1px 0;">
            <div class="row" style="margin: 6px 0px;">
                <div class="col-md-12" style="text-align: center;background: lightblue;">
                    @if($post->post_type == 'job')
                    <label style="margin:2px 0;"> Job Details </label>
                    @else($post->post_type == 'skill')
                    <label style="margin:2px 0;"> Skill Details </label>
                    @endif
                </div>
            </div>
            <div class="row"> 
                    <div class="timeline" >
                        <!-- TIMELINE ITEM -->
                        <div class="timeline-item">
                           
                             <div class="timeline-body" style=" margin-top:-9px;margin-left:13px;">
                                <div class="timeline-body-head">
                                    @if(  $post->individual_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{  $post->individual_id}}">
                                            
                                                
                                                
                                                <a href="/profile/ind/{{  $post->individual_id}}" style="font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{   $post->induser->fname}} {{   $post->induser->lname}}
                                                </a>
                                            
                                               
                                               
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif(  $post->corporate_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{  $post->corporate_id}}">
                                            
                                                                                                   
                                                <a href="/profile/corp/{{  $post->corporate_id}}" style="font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{   $post->corpuser->firm_name}}
                                                </a>
                                            
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="timeline-body-content">
                                    <span class="font-grey-cascade">
                                        @if(  $post->post_type == 'skill')    
                                        <div style="font-weight: 500;color: dimgrey;font-size: 14px;">{{   $post->post_title }} </div>
                                    @elseif(  $post->post_type == 'job')
                                         <div style="font-weight: 500;color: dimgrey;font-size: 14px;">{{   $post->post_title }}  </div>
                                    @endif  
                                    @if(  $post->post_compname != null)
                                    <div><h4 style="margin: 0 0 4px 0;"><small>Required at {{   $post->post_compname }}</small></h4></div>
                                    @endif                                          
                                    </span>
                                    
                                </div>  
                            </div>
                                    <div class="portlet-body" style="margin: 0 -5px;">
                                        <div class="panel-group accordion" id="accordion1" style="margin-bottom: 0;">
                                            <div class="panel panel-default" style=" position: relative;border:0 !important;">
                                                <div class="panel-heading" style="background-color: white;margin: 5px 0px;">
                                                   <!--  <h4 class="panel-title">
                                                    <a class="" 
                                                    data-toggle="collapse" data-parent="#accordion1" href="#collapse_1_1"  style="font-size: 15px;font-weight: 600;padding:0 16px;" >
                                                    Details: </a>   
                                                    </h4> -->
                                                </div>
                                                <div id="collapse_1_1" class="panel-collapse">
                                                    <div class="panel-body" style="border-top: 0;padding: 4px 15px;">
                                                        
                                                        <div class="row">
                                                             @if($post->post_type == 'job')
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <label class="detail-label">Job Title :</label>     
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                     {{ $post->post_title }}     
                                                            </div>
                                                            @elseif($post->post_type == 'skill')
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <label class="detail-label">Skill Title :</label>     
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                     {{ $post->post_title }}     
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <label class="detail-label">Education :</label>     
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    {{ $post->education }}     
                                                            </div>
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-6"> 
                                                                    <label class="detail-label">Job Role :</label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    {{ $post->role }}
                                                            </div>
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                           
                                                                        <label class="detail-label">Skills :</label>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                                                                                                
                                                                        @foreach($post->skills as $skill)
                                                                            {{$skill->name}}
                                                                        @endforeach
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                           
                                                                        <label class="detail-label">Job Type :</label>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                                                                                                
                                                                        {{ $post->time_for }}
                                                                </div>
                                                            </div>
                                                            <div class="row"> 
                                                                @if($post->locality != null && $post->city !=null)
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                           
                                                                        <label class="detail-label">Locality :</label>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                                                                                                
                                                                        {{ $post->locality }},{{ $post->city }} 
                                                                </div>
                                                                @elseif($post->locality == null && $post->city !=null)
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                           
                                                                        <label class="detail-label">Locality :</label>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">                                                                                                                                
                                                                        {{ $post->city }} 
                                                                </div>
                                                                @endif
                                                            </div>
                                                            
                                                             <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    {{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }}
                                                            </div>
                                                        </div>
                                                        <?php 
                                                            $strNew = '+'.$post->post_duration.' day';
                                                            $strOld = $post->created_at;
                                                            $fresh = $strOld->modify($strNew);

                                                            $currentDate = new \DateTime();
                                                            $expiryDate = new \DateTime($fresh);
                                                            // $difference = $expiryDate->diff($currentDate);
                                                            // $remainingDays = $difference->format('%d');
                                                            if($currentDate >= $fresh){
                                                                $expired = 1;
                                                            }else{
                                                                $expired = 0;
                                                            }
                                                        ?>
                                                        <div class="skill-display">Description : </div>
                                                        {{ $post->job_detail }}
                                                        
                                                        @if($post->post_type == 'job')
                                                        <div class="skill-display">Reference Id&nbsp;: {{ $post->reference_id }} </div> 
                                                        @endif

                                                       @if($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
                                                        @elseif($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
                                                        <div  class="skill-display ">Contact Details : </div> 
                                                        <div id="show-hide-contacts" class="row">
                                                            @if($post->post_type == 'job' && $post->website_redirect_url != null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                Click on Apply, it will redirect you to Company Website.
                                                            </div>
                                                            @endif
                                                            @if($post->post_type == 'job' && $post->website_redirect_url != null && $post->corpuser != null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">                                             
                                                                <label class="detail-label"><i class="glyphicon glyphicon-globe" style="color: deepskyblue;"></i> :</label>
                                                                {{ $post->website_url }}                                                            
                                                            </div>
                                                            @endif
                                                            @if($post->website_redirect_url == null && $post->contact_person != null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">                                             
                                                                <label class="detail-label"><i class="glyphicon glyphicon-user"></i> :</label>
                                                                {{ $post->contact_person }}                                                         
                                                            </div>
                                                            @endif

                                                            @if($post->email_id != null && $post->alt_emailid != null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>                                                              
                                                                    {{ $post->email_id }} - {{ $post->alt_emailid }}                            
                                                            </div>  
                                                            
                                                            @elseif($post->email_id != null && $post->alt_emailid == null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
                                                                    {{ $post->email_id }}
                                                                
                                                            </div>
                                                            @elseif($post->email_id == null && $post->alt_emailid != null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
                                                                        {{ $post->alt_emailid }}
                                                                 
                                                            </div>  
                                                            @endif  
                                                            @if($post->phone != null && $post->alt_phone != null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
                                                                
                                                                    
                                                                    {{ $post->phone }} - {{ $post->alt_phone }}
                                                                 
                                                            </div>  
                                                            @elseif($post->phone != null && $post->alt_phone == null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
                                                                
                                                                    
                                                                    {{ $post->phone }}
                                                                
                                                            </div>
                                                            @elseif($post->phone == null && $post->alt_phone != null && $post->website_redirect_url == null)
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
                                                                
                                                                        {{ $post->alt_phone }}
                                                                
                                                            </div>  
                                                            @endif                                      
                                                        </div>
                                                        @endif
                                                        <div class="skill-display">Post Id&nbsp;: {{ $post->unique_id }} </div>

                                                        @if($expired != 1)
                                                             <div class="skill-display">Post expires on:                                         
                                                             <span class="btn-success" style="padding: 2px 8px;font-size: 12px;border-radius: 20px !important;">{{$fresh->format("d M Y")}}</span>
                                                             </div>
                                                         @else
                                                             <div class="skill-display">Post expired on:                                         
                                                             <span class="btn-danger" style="padding: 2px 8px;font-size: 12px;border-radius: 20px !important;">{{$fresh->format("d M Y")}}</span>
                                                             </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($expired != 1 && Auth::user()->identifier == 1)
                                                                <div style="margin:27px 0 0;">
                                                                    <!-- if corporate_id not null -->
                                                                    @if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id)     
                                                                        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url != null)
                                                                            <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input type="hidden" name="apply" value="{{ $post->id }}">
                                                                                    <a class="btn apply-btn blue btn-sm apply-contact-btn show-contact" target="_blank" 
                                                                                        href="{{ $post->website_redirect_url }}" type="button"><i class="icon-globe"></i> Apply
                                                                                    </a>    
                                                                            </form> 
                                                                                
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url == null && $post->corporate_id != null)
                                                                        <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="hidden" name="apply" value="{{ $post->id }}">
                                                                            <button class="btn apply-btn blue btn-sm apply-contact-btn show-contact" 
                                                                                    id="apply-btn-{{$post->id}}" type="button">Apply
                                                                            </button>
                                                                        </form> 
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url == null && $post->individual_id != null)
                                                                        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="hidden" name="contact" value="{{ $post->id }}">
                                                                            <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
                                                                                    id="contact-btn-{{$post->id}}" type="button">Contact
                                                                            </button>
                                                                        </form> 
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 && Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url != null) 
                                                                            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true" style="padding: 4px 10px; line-height: 1.4;">
                                                                                <i class="icon-check icon-check-css"></i> Applied 
                                                                            </button>

                                                                            <div class="center-css">{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->apply_dtTime)) }}
                                                                            </div>
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1 &&  Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url == null && $post->individual_id != null) 
                                                                        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true" style="padding: 4px 10px; line-height: 1.4;">
                                                                            <i class="icon-check icon-check-css"></i> Contacted 
                                                                        </button>
                                                                        <div class="center-css">
                                                                            {{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
                                                                        </div>
                                                                       
                                                                        @endif

                                                                    <!-- if corporate_id is null     -->
                                                                    @elseif($post->post_type == 'job' && $post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)        
                                                                        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->resume_required == 1)
                                                                            <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <input type="hidden" name="contact" value="{{ $post->id }}">
                                                                                <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
                                                                                        id="contact-btn-{{$post->id}}" type="button">Contact
                                                                                </button>
                                                                            </form>     
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1 && Auth::user()->identifier == 1 && $post->resume_required == 1) 
                                                                            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
                                                                            <i class="icon-check icon-check-css"></i> Contacted 
                                                                        </button> 
                                                                        <div class="center-css">
                                                                            {{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
                                                                        </div>                                    
                                                                        @endif   
                                                                   

                                                                    @endif  
                                                                
                                                                </div>
                                                                @elseif($expired != 1)
                                                                <div style="margin:27px 0 0;">
                                                                    @if($post->post_type == 'skill' && Auth::user()->induser_id != $post->individual_id)       
                                                                    @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
                                                                        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="hidden" name="contact" value="{{ $post->id }}">
                                                                            <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
                                                                                    id="contact-btn-{{$post->id}}" type="button">Contact
                                                                            </button>
                                                                        </form> 
                                                                    @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
                                                                        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
                                                                            <i class="glyphicon glyphicon-ok"></i> Contacted
                                                                        </button>
                                                                        <div class="center-css">
                                                                            {{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
                                                                        </div>
                                                                        @else
                                                                    <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="contact" value="{{ $post->id }}">
                                                                        <button class="btn contact-btn green btn-sm apply-contact-btn" 
                                                                                id="contact-btn-{{$post->id}}" type="button">Contact
                                                                        </button>
                                                                    </form>                         
                                                                    @endif  
                                                                @endif
                                                                </div>
                                                                @elseif($expired == 1)
                                                                <div class="row" style="text-align:center;">
                                                                    @if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1) 
                                                                        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty()) 
                                                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                                            </div>
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1) 
                                                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
                                                                            </div>
                                                                        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
                                                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
                                                                            </div>
                                                                        @endif
                                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                                        <i class="glyphicon glyphicon-ban-circle"></i> Expired
                                                                    </div>
                                                                    @endif
                                                                </div>                                      
                                                                @endif
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>



                   

                    
             </div>
        </div>
    </div>
</div>  
</div>

 <script>
$(document).ready(function(){
$('.apply-btn').on('click',function(event){         
    event.preventDefault();
    var post_id = $(this).parent().data('id');

    var formData = $('#post-apply-'+post_id).serialize(); 
    var formAction = $('#post-apply-'+post_id).attr('action');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        if(data == "applied"){
            $('#apply-btn-'+post_id).prop('disabled', true);
            $('#apply-btn-'+post_id).text('Applied');
            $('#show-hide-contacts').addClass('show-hide-new');
        }
      }
    }); 
    return false;
  });
    
$('.contact-btn').on('click',function(event){       
    event.preventDefault();
    var post_id = $(this).parent().data('id');

    var formData = $('#post-contact-'+post_id).serialize(); 
    var formAction = $('#post-contact-'+post_id).attr('action');
    // console.log(post_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        // console.log("s:"+data);
        if(data.data.contact_status == "contacted"){
            $('#contact-btn-'+post_id).prop('disabled', true);
            $('#contact-btn-'+post_id).text('Contacted');
            $('#show-hide-contacts').addClass('show-hide-new');
        }
      },
      error: function(data) {
            console.log("e:"+data);
       }
    }); 
    return false;
  });
});
  </script>