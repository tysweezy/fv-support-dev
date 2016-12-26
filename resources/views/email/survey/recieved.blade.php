<div>
   <p>Hello there! Thank you for submitting your request!</p>
   
    <p>If you're already a registered user, you can <a href="{{ url('/login') }}" target="_blank">sign in here</a> and take a look at your project.</p>

    <p>If you're not a registerd user, you can 
      <a href="{{ url('/register?'. http_build_query([
            'email' => 'someemail@email.com'
       ])) 
    }}">
    sign up for an account here</a>.</p>


    <p>I look forward to working with you in this next project!</p>

    <p>Best,</p>
    <p>Tyler Souza, Web Developer @ FocusVision</p>

</div>