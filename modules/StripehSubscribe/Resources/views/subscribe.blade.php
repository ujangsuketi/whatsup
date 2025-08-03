<script type="text/javascript">
        
    
        var currentUserEmail="{{ auth()->user()->email }}";
        var currentUserID="{{ auth()->user()->id }}";
      

        plans.forEach(plan => {
            
            if(plan.stripe_id != null && user.subscription_plan_id != plan.stripe_id){
               
                var route="/stripeh-subscribe/getSubscriptionLink/"+plan.id;
                var buttonName="{{__('Switch to ')}}"+plan.name;
                $('#button-container-plan-'+plan.id).append("<a  href=\""+route+"\" class=\"btn btn-primary\">"+buttonName+"</a>" );
            }
        });


    </script> 