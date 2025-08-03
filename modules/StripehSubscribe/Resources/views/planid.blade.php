<div class="col-md-6">
    @include('partials.input',['name'=>'Stripe Pricing ID','id'=>"subscribe[stripe_id]",'placeholder'=>"Stripe Pricing ID",'required'=>false,'value'=>(isset($plan)?$plan->stripe_id:null)])
</div>
