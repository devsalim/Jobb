
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
                                        <div style="font-weight: 600;color: black;font-size: 16px;">{{   $post->post_title }} </div>
                                    @elseif(  $post->post_type == 'job')
                                         <div style="font-weight: 600;color: black;font-size: 16px;">{{   $post->post_title }}  </div>
                                    @endif  
                                    @if(  $post->post_compname != null)
                                    <div><h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{   $post->post_compname }}</h4></div>
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