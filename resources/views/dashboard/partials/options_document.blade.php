{{-- 'C.C.', 'C.E.','Pasaporte','R.C.' --}}
<option value="cedula_ciudadana">C.C.</option>
<option value="cedula_extranjera"{{ $val =='cedula_extranjera' ? 'selected="selected"':'' }}>C.E.</option>
<option value="Pasaporte" {{ $val =='Pasaporte' ? 'selected="selected"':'' }}>Pasaporte</option>
<option value="R.C." {{ $val =='R.C.' ? 'selected="selected"':'' }}>R.C.</option>

