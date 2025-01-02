@extends('layouts.app')

@section('title', 'Sign-Up')

@section('content')

<div class="bg-image d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 400px; width: 100%;">
      <div class="text-center mb-4">
    
        <h2 class="fw-bold" style="color: #007bff;">Sign Up</h2>
      </div>
      <form id="signupForm">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control form-control-lg" id="fullname" placeholder="Enter your full name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control form-control-lg" id="password" placeholder="Create a password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control form-control-lg" id="confirmPassword" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-primary-gradient w-100 fw-bold">Submit</button>
      </form>
      <div id="feedback" class="mt-3"></div> <!-- Feedback area -->
      <p class="text-center mt-3">Already have an account? <a href="login.html" class="text-decoration-none" style="color: #007bff;">Login</a></p>
    </div>
  </div>

@endsection