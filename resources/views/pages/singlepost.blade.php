
<div class="modal-body modal-body-new">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="portlet light bordered" style="border: none !important;background:transparent">                                     
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row"> 
                    <div class="timeline" >
                        <!-- TIMELINE ITEM -->
                        <div class="timeline-item">
                            <div class="timeline-badge" style="margin: 10px 0px;">
                                @if(  $post->induser != null && !empty(  $post->induser->profile_pic))
                                <img class="timeline-badge-userpic userpic-box" src="/img/profile/{{   $post->induser->profile_pic }}" title="{{   $post->induser->fname }}">
                                <a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style="font-size:12px;"></i></a>
                                @elseif(  $post->corpuser != null && !empty(  $post->corpuser->logo_status))
                                <img class="" src="/img/profile/{{   $post->corpuser->logo_status }}" title="{{   $post->corpuser->firm_name }}">
                                <a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
                                @elseif(empty(  $post->corpuser->logo_status) &&   $post->corpuser != null)
                                <img class="" src="/assets/images/corp.png">
                                <a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
                                @elseif(empty(  $post->induser->profile_pic) &&   $post->induser != null)
                                <img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
                                <a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style=" font-size:12px;"></i></a>
                                @endif

                                <div class="match"><a data-toggle="modal" href="#{{  $post->id}}"><i class="icon-speedometer"></i> 55%</a></div>
                                <div id="oval"></div>
                                <!-- Modal for Matching Percentage -->
                            </div>
                             <div class="timeline-body" style=" margin-top:-9px;">
                                <div class="timeline-body-head">
                                    @if(Auth::user()->induser_id ==   $post->individual_id &&   $post->individual_id != null)
                                        <div class="timeline-body-head-caption">
                                            @if(  $post->post_type == 'job')                                                  
                                                <a href="/profile/ind/{{  $post->individual_id}}" class="link-label" data-utype="ind">
                                                    You have
                                                </a>
                                            @else                                                   
                                                <a href="/profile/ind/{{  $post->individual_id}}" class="link-label" data-utype="ind">
                                                    You have
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif(Auth::user()->corpuser_id ==   $post->corporate_id &&   $post->corporate_id != null)
                                        <div class="timeline-body-head-caption">
                                            @if(  $post->post_type == 'job')                                                  
                                                <a href="/profile/corp/{{  $post->corporate_id}}" class="link-label" data-utype="corp">
                                                    You have
                                                </a>
                                            @else                                                   
                                                <a href="/profile/corp/{{  $post->corporate_id}}" class="link-label" data-utype="corp">
                                                    You have
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif(  $post->individual_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{  $post->individual_id}}">
                                            @if(  $post->post_type == 'job')
                                                @if($links->contains('id',   $post->individual_id))
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:salmon;"></i>
                                                </a>
                                                @elseif($following->contains('id',   $post->individual_id))
                                                <a class="user-link2" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:steelblue;"></i>
                                                </a>
                                                @else
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
                                                    <i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
                                                </a>
                                                @endif
                                                
                                                <a href="/profile/ind/{{  $post->individual_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{   $post->induser->fname}} {{   $post->induser->lname}}
                                                </a>
                                            @else
                                                @if($links->contains('id',   $post->individual_id))
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:salmon;"></i>
                                                </a>
                                                @elseif($following->contains('id',   $post->individual_id))
                                                <a class="user-link2" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:steelblue;"></i>
                                                </a>
                                                @else
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
                                                    <i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
                                                </a>
                                                @endif
                                                <a href="/profile/ind/{{  $post->individual_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{   $post->induser->fname }} {{   $post->induser->lname }}
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif(  $post->corporate_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{  $post->corporate_id}}">
                                            @if(  $post->post_type == 'job')
                                                @if($following->contains('id',   $post->corporate_id))
                                                    <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="corp">
                                                        <i class="icon-user-following" style="color:black;"></i>
                                                    </a>
                                                @else
                                                    <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="corp">
                                                        <i class="icon-user-follow" style="color:lightslategray;"></i>
                                                    </a>
                                                @endif                                                      
                                                <a href="/profile/corp/{{  $post->corporate_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{   $post->corpuser->firm_name}}
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime(  $post->created_at)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="timeline-body-content">
                                    <span class="font-grey-cascade">
                                        @if(  $post->post_type == 'skill')    
                                        <div style="font-weight: 600;color: black;font-size: 16px;">{{   $post->post_title }} </div>
                                    @elseif(  $post->post_type == 'job')
                                         <div style="font-weight: 600;color: black;font-size: 16px;">{{   $post->post_title }}  </div>
                                    @endif  
                                    @if(  $post->post_compname != null)
                                    <div><h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{   $post->post_compname }}</h4></div>
                                    @endif                                          
                                    </span>
                                    <div class="row">
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="icon-badge"></i>&nbsp;: {{   $post->role }}
                                        </div> -->
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{   $post->city }}
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="icon-briefcase"></i>&nbsp;: {{   $post->min_exp}}-{{   $post->max_exp}} Years
                                        </div>
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{   $post->min_sal }}-{{   $post->max_sal }}/Hours
                                        </div> -->
                                    </div>
                                </div>  
                            </div>
                                    <div class="portlet-body" style="margin: 0 -5px;">
                                        <div class="panel-group accordion" id="accordion1" style="margin-bottom: 0;">
                                            <div class="panel panel-default" style=" position: relative;border:0 !important;">
                                                <div class="panel-heading" style="background-color: white;margin: 5px 0px;">
                                                    <h4 class="panel-title">
                                                    <a class="" 
                                                    data-toggle="collapse" data-parent="#accordion1" href="#collapse_1_1"  style="font-size: 15px;font-weight: 600;padding:0 16px;" >
                                                    Details: </a>   
                                                    </h4>
                                                </div>
                                                <div id="collapse_1_1" class="panel-collapse">
                                                    <div class="panel-body" style="border-top: 0;padding: 4px 15px;">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label">Education Required :</label>
                                                                
                                                                    {{ $post->education }}
                                                                 
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label">Role :</label>
                                                                
                                                                    {{ $post->role }}
                                                                
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label">Job Category :</label>
                                                                
                                                                    {{ $post->prof_category }}
                                                                 
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label">Skills :</label>
                                                                
                                                                    @foreach($post->skills as $skill)
                                                                        {{$skill->name}},
                                                                    @endforeach
                                                                 
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
                                                                
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

                                                        @if($expired != 1)
                                                        <div class="skill-display">Contact Details : </div> 
                                                        <div class="row">
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