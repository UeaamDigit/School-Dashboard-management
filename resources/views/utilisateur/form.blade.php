<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('nom') }}</label>
    <div>
        {{ Form::text('nom', $utilisateur->nom, [
            'class' => 'form-control' . ($errors->has('nom') ? ' is-invalid' : ''),
            'placeholder' => 'Nom',
        ]) }}
        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('email') }}</label>
    <div>
        {{ Form::text('email', $utilisateur->email, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
            'placeholder' => 'Email',
        ]) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('adresse') }}</label>
    <div>
        {{ Form::text('email', $utilisateur->adresse, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
            'placeholder' => 'Adresse',
        ]) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('phone') }}</label>
    <div>
        {{ Form::text('email', $utilisateur->phone, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
            'placeholder' => 'Phone',
        ]) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('sexe') }}</label>
    <div>
        {{ Form::text('email', $utilisateur->sexe, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
            'placeholder' => 'Female Or Male ',
        ]) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('country') }}</label>
    <div>
        {{ Form::text('email', $utilisateur->country, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
            'placeholder' => 'Country',
        ]) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="#" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
        </div>
    </div>
</div>
