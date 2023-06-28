@component('mail::message')
# Thank You for Choosing FUN-erals

Dear {{ $mailData['name'] }},

Thank you for entrusting FUN-erals with your funeral service needs. There are your and your order details:

@component('mail::panel')
**Client name:** {{$mailData['client']->name.' '.$mailData['client']->surname}}
<br>
**Pesel:** {{$mailData['client']->pesel}}
<br>
**Phone number:** {{$mailData['client']->phone_number}}
<br>
**e-mail:** {{$mailData['client']->email}}
<br>
**Date:** {{$mailData['funeral']->date}}
<br>
**Offer type** {{$mailData['funeral']->offer->name}}
<br>
@if($mailData['discount'] != 1.0)
**Discount:** {{$mailData['discount']*100}}%
<br>
@endif
**Final price:** {{$mailData['funeral']->cost}}
@endcomponent

We appreciate your support and would like to express our gratitude by offering you a special promo code. Take advantage of this exclusive offer before it expires!

@component('mail::panel')
**Promo Code:** {{ $mailData['promocode']->code }}
<br>
**Discount:** {{$mailData['promocode']->discount*100}}%
<br>
**Expiration Date:** {{ $mailData['exp_date'] }}
@endcomponent

We understand that this is a challenging time for you and your loved ones. Our team is dedicated to providing compassionate and professional funeral services to ensure a meaningful tribute to your departed family member or friend.

If you have any questions or require further assistance, please feel free to reach out to our customer support team. We are here to help you during this difficult period.

Once again, we sincerely thank you for choosing FUN-erals.

Best regards,

The FUN-erals Team
@endcomponent
