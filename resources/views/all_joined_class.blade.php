@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
                   <div class="col-md-offset-1 col-md-10" >

                                <!-- Dismissable Alert -->
                                <div class="panel panel-default" >
                                    <div class="alert alert-info fade in" style="padding:40px;">
                                            <h4>Show Your Joined Classes by clicking the Butoon Below</h4>
                                              <p>For years, education has evolved and molded accordingly to many different eras. From the times such as the Industrial Revolution to the landing of the first man on the moon, education has always adapted to the ever-changing world. In today’s society, the rise in technology has caused education to adapt once again to the current world. Instead of a traditional classroom-based education, technology has given education the opportunity to be taught in online classes. The relatively new method of online classes has already been introduced in many schools across the world. As with all technological advancements, however, there is much skepticism regarding technology integration. Many advocates of online classes find the integration of technology promising</p>

                                              <a style="margin-top:30px;" class="btn btn-danger" href="{{ URL::to('show-joined-class/'.Auth::user()->id) }}">Show My Joined Classes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div> <!-- content -->
                            
</div>

</script>
@endsection