@component('mail::message')
# Thank You for Choosing FUN-erals

Dear {{ $mailData['name'] }},

Thank you for entrusting FUN-erals with your funeral service needs. We appreciate your support and would like to express our gratitude by offering you a special promo code. Take advantage of this exclusive offer before it expires!

@component('mail::panel')
**Promo Code:** {{ $mailData['promocode'] }}
<br>
**Expiration Date:** {{ $mailData['exp_date'] }}
@endcomponent

We understand that this is a challenging time for you and your loved ones. Our team is dedicated to providing compassionate and professional funeral services to ensure a meaningful tribute to your departed family member or friend.

If you have any questions or require further assistance, please feel free to reach out to our customer support team. We are here to help you during this difficult period.

Once again, we sincerely thank you for choosing FUN-erals.

Best regards,

The FUN-erals Team
@endcomponent
