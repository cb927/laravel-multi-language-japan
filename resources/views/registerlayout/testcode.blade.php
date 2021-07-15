<form method="POST" action="{{route('individual-confirm')}}" enctype="multipart/form-data" class="register_form">
@csrf

<input type="hidden" name="basic_information[currency]" value="USD">
<input type="hidden" name="basic_information[leverage]" value="100">

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