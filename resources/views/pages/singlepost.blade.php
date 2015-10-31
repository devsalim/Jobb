
<div class="modal-body">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="portlet light bordered" style="border: none !important;background:transparent">                                     
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row"> 
                    <div class="timeline" >
                        <!-- TIMELINE ITEM -->
                        <div class="timeline-item time-item">
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
                                <div class="modal fade" id="{{  $post->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style=" padding: 10px !important;">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;right: 15px;top: 15px;"></button>
                                                <div class="modal-body" style=" padding:10px 0 !important;">
                                                    
                                                        <!-- BEGIN BORDERED TABLE PORTLET-->
                                                        <div class="portlet box">
                                                            <div class="portlet-title">
                                                                <div class="caption links-title">
                                                                    <i class="icon-speedometer" style="font-size:16px;"></i> 56% Match
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body" style=" padding: 0 !important;">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                    <tr>

                                                                        <th class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                             Required Profile
                                                                        </th>
                                                                        <th class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                             My Profile
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align">
                                                                                <label>Skill</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                                @foreach(  $post->skills as $skill)
                                                                                    {{$skill->name}},
                                                                                @endforeach
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                                @foreach(  $post->skills as $skill)
                                                                                    {{$skill->name}},
                                                                                @endforeach
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i>
                                                                                <label> Job Role</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->role }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->role }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                 <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                 <label> Job Category</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{   $post->prof_category }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                Programmer
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i> 
                                                                                <label>Experience</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->min_exp }}-{{   $post->max_exp }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->min_exp }}-{{   $post->max_exp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                <label> Education</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{   $post->education }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{   $post->education }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i> 
                                                                                <label>Location</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->city }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{   $post->city }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                <label> Job Type</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{   $post->time_for }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{   $post->jobtype }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END BORDERED TABLE PORTLET-->
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                             <div class="timeline-body" style="">
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
                        </div>
                    </div>
             </div>
        </div>
    </div>
</div>	
</div>