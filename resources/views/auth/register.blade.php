@extends('layout.master')

@section('title','Register | kwntu')

@section('content')
<main class="container">
	<div class="panel signup-form">
	    <div class="row">       
	        <div class="col-md-12">         
	            <form method="POST"
	                  id="signup_form"
	                  action="{{ route('register') }}">
	                {{ csrf_field() }}
	                <h2>Join kwntu</h2>
	                <div class="row">
	                    <div class="col-md-6 col-sm-6">
	                        <div class="form-group{{ $errors->has('member_fname') ? ' has-error' : '' }}">
	                            <label for="signup_fname">
	                                First Name
	                            </label>
	                            <input type="text"
	                                   class="form-control"
	                                   name="member_fname"
	                                   id="signup_fname"
	                                   value="{{ old('member_fname') }}"
	                                   required
	                                   autofocus>
                              	@if ($errors->has('member_fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_fname') }}</strong>
                                    </span>
                                @endif
	                        </div>                        
	                    </div>
	                    <div class="col-md-6  col-sm-6">
	                        <div class="form-group{{ $errors->has('member_lname') ? ' has-error' : '' }}">
	                            <label for="signup_lname">
	                                Last Name
	                            </label>
	                            <input type="text"
	                                   class="form-control"
	                                   name="member_lname"
	                                   id="signup_lname"
	                                   value="{{ old('member_lname') }}"
	                                   required>
                              	@if ($errors->has('member_lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_lname') }}</strong>
                                    </span>
                                @endif
	                        </div>
	                        
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('member_addr') ? ' has-error' : '' }}">
	                    <label for="signup_address">
	                        Address
	                    </label>
	                    <textarea name="member_addr"
	                              rows="3"
	                              class="form-control" 
	                              id="signup_address">{{ old('member_addr') }}</textarea>
	                </div>
	                <div class="row">
	                <!-- Favorite Genres -->
<!-- 		                <div class="col-md-6 col-sm-6">
			                <div class="form-group">
			                    <label for="signup_pgenre">
			                        What are your favorite book genres?:
			                    </label>                    
	                            <input type="text"
	                                   class="form-control"
	                                   name="favgenres"
	                                   id="signup_pgenre"
	                                   value=""
	                                   disabled>
			                </div>		                	
		                </div> -->
		                <div class="col-md-6 col-sm-6">
			                <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }}">
			                    <label for="signup_email">
			                        Email address
			                    </label>                    
	                            <input type="email"
	                                   class="form-control"
	                                   name="user_email"
	                                   id="signup_email"
	                                   value="{{ old('user_email') }}">
	                      	@if ($errors->has('user_email'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('user_email') }}</strong>
	                            </span>
	                        @endif
			                </div>		                	
		                </div>
		                <div class="col-md-6 col-sm-6">		                	
			                <div class="form-group{{ $errors->has('member_dbirth') ? ' has-error' : '' }}">
			                    <label for="signup_datebirth">
			                        Date of birth
			                    </label>			                    
	                            <input type="date"
	                                   class="form-control"
	                                   name="member_dbirth"
	                                   id="signup_datebirth">
		                      	@if ($errors->has('member_dbirth'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('member_dbirth') }}</strong>
		                            </span>
		                        @endif
			                </div>		             
		                </div>	                	
	                </div>
	                <div class="row">
	                    <div class="col-md-6 col-sm-6">
	                        <div class="form-group">
	                            <label for="signup_gender"
	                                   id="gender-label"
	                                   style="display: block;">
	                                Gender
	                            </label>
	                            <label class="radio-inline">
	                                <input type="radio"
	                                       name="member_gender"
	                                       value="m">
	                                    Male
	                            </label>
	                            <label class="radio-inline">
	                                <input type="radio"
	                                       name="member_gender"
	                                       value="f">
	                                    Female
	                            </label>
	                            <label class="radio-inline">
	                                <input type="radio"
	                                       name="member_gender"
	                                       value="o"
	                                       checked
	                                       required>
	                                    Other
	                            </label>
	                        </div>                        
	                    </div>
	                    <div class="col-md-6 col-sm-6">
	                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
	                            <label for="signup_cname">
	                                Preferred Codename
	                            </label>
	                            <input type="text"
	                                   class="form-control"
	                                   name="user_name"
	                                   id="signup_cname"
	                                   value="{{ old('user_name') }}"
	                                   required>
                              	@if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
	                        </div>                        
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6 col-sm-6">
	                        <div class="form-group{{ $errors->has('user_pword') ? ' has-error' : '' }}">
	                            <label for="signup_pword">
	                                Preferred Password
	                            </label>
	                            <input type="password"
	                                   class="form-control"
	                                   name="user_pword"
	                                   id="signup_pword"
	                                   required>
                              	@if ($errors->has('user_pword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_pword') }}</strong>
                                    </span>
                                @endif
	                        </div>                        
	                    </div>
	                    <div class="col-md-6 col-sm-6">
	                        <div class="form-group">
	                            <label for="signup_pword2">
	                                Confirm Password
	                            </label>
	                            <input type="password"
	                                   class="form-control"
	                                   name="user_pword_confirmation"
	                                   id="signup_pword2"
	                                   required>
	                        </div>                        
	                    </div>
	                </div>
	                <button type="reset"
	                        class="btn btn-warning">
	                    Clear
	                </button>
	                <button type="submit"
	                        class="btn btn-primary pull-right">
	                    Submit
	                </button>               
	                
	            </form>
	        </div>
	    </div>
		
	</div>
</main>
@endsection