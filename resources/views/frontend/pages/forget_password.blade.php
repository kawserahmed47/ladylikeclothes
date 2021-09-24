
<form id="forgetPasswordForm" onsubmit="event.preventDefault();forgetPasswordForm()" method="POST">
    @csrf

    <div class="form-group">
        <label for="singin-email" class="singin-email-label">Email address or mobile number *</label>
        <input type="text" class="form-control" disabled value="{{$email_or_mobile}}"  id="singin-email" name="email">
        <input type="hidden" name="email_or_mobile" value="{{$email_or_mobile}}">
    </div><!-- End .form-group -->

    {{-- <div class="form-group">
        <label for="otp" class="singin-email-label">OTP* (An otp sent to your email/mobile)</label>
        <input type="text" class="form-control" id="otp" placeholder="OTP" name="otp" required>
    </div> --}}
    
    <!-- End .form-group -->

    <div class="form-group">
        <label for="singin-password" class="singin-email-label">New Password *</label>
        <input type="password" class="form-control" id="singin-password" placeholder="********" name="password" required>
    </div><!-- End .form-group -->

    <div class="form-group">
        <label for="singin-cpassword">Confirm Password *</label>
        <input type="password" class="form-control" id="singin-cpassword" placeholder="********" name="password" required>
    </div><!-- End .form-group -->

    <div class="form-footer">
        <button type="submit" class="btn btn-outline-primary-2">
            <span>RESET PASSWORD</span>
            <i class="icon-long-arrow-right"></i>
        </button>
    </div><!-- End .form-footer -->
</form>