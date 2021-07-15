
<form method="POST" action="{{route('corporate-confirm')}}" enctype="multipart/form-data" class="register_form">
@csrf

<input type="hidden" name="basic_information[currency]" value="USD">
<input type="hidden" name="basic_information[leverage]" value="100">

<!--法人のみbegin-->

<input type="hidden" name="company[name]" value="test">
<input type="hidden" name="company[type_business]" value="test">
<input type="hidden" name="company[incorporation][country]" value="test">
<input type="hidden" name="company[incorporation][year]" value="test">
<input type="hidden" name="company[incorporation][month]" value="test">
<input type="hidden" name="company[incorporation][day]" value="test">
<input type="hidden" name="company[address1]" value="test">
<input type="hidden" name="company[address2]" value="test">
<input type="hidden" name="company[address3]" value="test">
<input type="hidden" name="company[address4]" value="test">
<input type="hidden" name="company[address5]" value="test">
<input type="hidden" name="company[address6]" value="test">
<input type="hidden" name="company[phone]" value="test">
<input type="hidden" name="company[email]" value="test">

<!--法人のみend-->

<input type="hidden" name="primary_holder[last_name]" value="test">
<input type="hidden" name="primary_holder[first_name]" value="test">

<input type="hidden" name="primary_holder[from]" value="Kyoto">
<input type="hidden" name="primary_holder[country]" value="Japan">
<input type="hidden" name="primary_holder[birth_year]" value="2000">
<input type="hidden" name="primary_holder[birth_month]" value="01">
<input type="hidden" name="primary_holder[birth_day]" value="01">

<input type="hidden" name="primary_holder[address1]" value="Kyoto">
<input type="hidden" name="primary_holder[address2]" value="Kyoto">
<input type="hidden" name="primary_holder[address3]" value="Kyoto">
<input type="hidden" name="primary_holder[address4]" value="Kyoto">
<input type="hidden" name="primary_holder[address5]" value="Kyoto">
<input type="hidden" name="primary_holder[address6]" value="Kyoto">

<input type="hidden" name="primary_holder[phone]" value="09011111111">
<input type="hidden" name="primary_holder[email]" value="test@test.com">

<input type="hidden" name="citizenship_declaration[declaration]" value="1">

<input type="hidden" name="backend[document_type]" value="PP">
<input type="hidden" name="backend[document_country]" value="Japan">

<!--
<input type="file" name="doc_id" accept=".PNG,.JPG,.png,.jpg,.jpeg">
<input type="file" name="doc_proof_of_address" accept=".PNG,.JPG,.png,.jpg,.jpeg">
-->
同意のチェック



<input type="hidden" name="extra_information[ib_name]" value="">

<input type="submit" value="送信">

</form>
