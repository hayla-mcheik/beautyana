@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fa fa-check-circle me-2"></i>
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">

        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>
@endif

<form action="{{ url('/book-appointment') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-3">

            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Full Name"
                value="{{ old('name') }}"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Email Address"
                value="{{ old('email') }}">

        </div>

        <div class="col-md-6 mb-3">

            <input
                type="text"
                name="phone"
                class="form-control"
                placeholder="Phone Number"
                value="{{ old('phone') }}"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <input
                type="text"
                name="subject"
                class="form-control"
                placeholder="Subject"
                value="{{ old('subject') }}"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <div class="appointment-input-wrapper">

                <span class="appointment-input-label">
                    Appointment Date
                </span>

                <input
                    type="date"
                    name="appointment_date"
                    class="form-control appointment-date-time"
                    value="{{ old('appointment_date') }}"
                    required>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="appointment-input-wrapper">

                <span class="appointment-input-label">
                    Appointment Time
                </span>

                <input
                    type="time"
                    name="appointment_time"
                    class="form-control appointment-date-time"
                    value="{{ old('appointment_time') }}"
                    required>

            </div>

        </div>

        <div class="col-12 mb-4">

            <textarea
                class="form-control"
                rows="5"
                name="message"
                placeholder="Your Message"
                required>{{ old('message') }}</textarea>

        </div>

        <div class="col-12">

            <button
                type="submit"
                class="btn-demanto w-100">

                Book Appointment

            </button>

        </div>

    </div>

</form>
<style>
/*==================================================
    DEMANTO APPOINTMENT
==================================================*/

@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');

:root{

    --gold:#B39256;
    --gold-dark:#8F7242;
    --gold-light:#F8F4EC;

    --text:#42362A;
    --muted:#8A8A8A;

    --border:#ECE6DD;

    --shadow:0 25px 60px rgba(0,0,0,.08);

}

body{

    background:#FCFAF7;

}

/*==================================================
CARD
==================================================*/

.appointment-card{

    background:#fff;

    border-radius:28px;

    padding:70px;

    border:1px solid var(--border);

    box-shadow:var(--shadow);

    overflow:hidden;

    position:relative;

}

.appointment-card::before{

    content:"";

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:6px;

    background:linear-gradient(90deg,#B39256,#E4D2AE,#B39256);

}

/*==================================================
TITLE
==================================================*/

.appointment-title{

    font-family:"Cormorant Garamond",serif;

    font-size:54px;

    font-weight:600;

    color:var(--gold);

    letter-spacing:1px;

    margin-bottom:15px;

}

.appointment-subtitle{

    max-width:650px;

    margin:auto;

    color:#6E6E6E;

    font-size:17px;

    line-height:1.9;

    font-family:"Montserrat",sans-serif;

}

/*==================================================
FORM
==================================================*/

.appointment-form{

    margin-top:55px;

}

.appointment-form .row{

    --bs-gutter-x:28px;

    --bs-gutter-y:20px;

}

/*==================================================
INPUTS
==================================================*/

.appointment-form .form-control{

    height:64px;

    border:1px solid var(--border);

    border-radius:14px;

    background:#fff;

    padding:18px;

    font-size:15px;

    font-family:"Montserrat",sans-serif;

    color:var(--text);

    transition:.35s;

    box-shadow:none;

}

.appointment-form textarea.form-control{

    height:180px;

    resize:none;

    padding-top:18px;

}

.appointment-form .form-control:hover{

    border-color:#D8C5A2;

}

.appointment-form .form-control:focus{

    border-color:var(--gold);

    box-shadow:0 0 0 4px rgba(179,146,86,.12);

}

.appointment-form .form-control::placeholder{

    color:#A4A4A4;

}

/*==================================================
DATE / TIME
==================================================*/

.appointment-input-wrapper{

    position:relative;

}

.appointment-input-label{

    position:absolute;

    top:10px;

    left:18px;

    background:#fff;

    padding:0 5px;

    font-size:10px;

    letter-spacing:1px;

    color:var(--gold);

    font-family:"Montserrat",sans-serif;

    text-transform:uppercase;

    z-index:5;

}

.appointment-date-time{

    padding-top:24px !important;

}

/*==================================================
BUTTON
==================================================*/

.appointment-form .btn-demanto{

    width:100%;

    height:62px;

    border:none;

    border-radius:50px;

    background:linear-gradient(135deg,#B39256,#9A7B45);
    color: #51555a;
    display: inline-block;
    font-weight: 700;
    font-size: 18px;
    position: relative;
    padding: 13px 55px 13px 25px;
    overflow: hidden;
    text-align: center;

    transition:.35s;

}

.appointment-form .btn-demanto:hover{

    transform:translateY(-3px);

    box-shadow:0 18px 35px rgba(179,146,86,.30);

}

/*==================================================
SUCCESS
==================================================*/

.alert-success{

    background:#F5FBF7;

    border:none;

    border-left:5px solid #3AA76D;

    border-radius:14px;

    color:#236040;

    padding:18px;

}

/*==================================================
ERROR
==================================================*/

.alert-danger{

    background:#FFF6F5;

    border:none;

    border-left:5px solid #D9534F;

    border-radius:14px;

    color:#8E2D2B;

    padding:18px;

}

/*==================================================
RESPONSIVE
==================================================*/

@media(max-width:991px){

.appointment-card{

    padding:45px;

}

.appointment-title{

    font-size:42px;

}

}

@media(max-width:768px){

.appointment-card{

    padding:25px;

    border-radius:20px;

}

.appointment-title{

    font-size:34px;

}

.appointment-subtitle{

    font-size:15px;

}

.appointment-form{

    margin-top:35px;

}

.appointment-form .form-control{

    height:58px;

    font-size:14px;

}

.appointment-form textarea.form-control{

    height:150px;

}

}
.btn-demanto {
    position: relative;

    z-index: 1;

    display: inline-flex;

    align-items: center;
    justify-content: center;

      border-radius: 50px;
    color: #51555a;
    display: inline-block;
    font-weight: 700;
    font-size: 18px;
    position: relative;
    padding: 13px 55px 13px 25px;
    overflow: hidden;
    text-align: center;

    overflow: hidden;

    border: 0;
    background:
        linear-gradient(
            135deg,
            var(--demanto-dark),
            var(--demanto-gold-dark)
        );

    color: #FFFFFF !important;

    font-family:
        "Montserrat",
        sans-serif;

    font-size: 10px;
    font-weight: 500;

    line-height: 1.4;

    letter-spacing: 1.5px;

    text-align: center;
    text-decoration: none;
    text-transform: uppercase;

    cursor: pointer;

    transition: var(--transition-smooth);
}


.btn-demanto::before {
    content: "";

    position: absolute;

    top: 0;
    left: -100%;

    width: 100%;
    height: 100%;

    z-index: -1;

    border-radius: inherit;

    background:
        linear-gradient(
            135deg,
            var(--demanto-dark),
            #1A1A1A
        );

    transition: left 0.5s ease;
}


.btn-demanto:hover::before {
    left: 0;
}


.btn-demanto:hover {
    color: #FFFFFF !important;

    transform: translateY(-2px);

    box-shadow:
        0 5px 15px rgba(179, 146, 86, 0.30);
}


.btn-demanto-outline {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    padding: 8px 20px;

    border:
        1.5px solid var(--demanto-gold);

    border-radius: 25px;

    background: transparent;

    color: var(--demanto-gold);

    font-family:
        "Montserrat",
        sans-serif;

    font-size: 10px;
    font-weight: 500;

    letter-spacing: 1.5px;

    text-decoration: none;
    text-transform: uppercase;

    transition: var(--transition-smooth);
}


.btn-demanto-outline:hover {
    background: var(--demanto-gold);

    color: #FFFFFF !important;

    transform: translateY(-2px);

    box-shadow:
        0 5px 15px rgba(179, 146, 86, 0.20);
}

</style>