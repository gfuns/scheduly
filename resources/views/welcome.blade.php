@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="appointly col-md-8">
            <div class="about-me">
                <div class="my-name">
                    <div class="fit-image my-image" data-image-width="205" data-image-height="179"></div>
                    Gabriel Nwankwo
                </div>
                <div class="my-job">Full Stack Developer</div>
                <div class="short-summary">I help agencies and brands turn their ideas into reality. My mind is filled with creativity and my actions has always been business led. Having me on your team will surely be a blessing!</div>
            </div>  
            <div class="contact-buttons">
                <a href="/login" class="appointment-button">Book An Appointment</a>
                <a href="https://resume.io/r/p6xwxiteY" class="resume-button"><i class="far fa-arrow-alt-circle-down"></i> View My Resume</a>
            </div>
        </div>
    </div>
</div>

@endsection
