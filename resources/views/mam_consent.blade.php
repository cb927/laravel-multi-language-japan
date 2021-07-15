<h1>Limited Power Of Attorney Form<br>
DISCRETIONARY TRADING AUTHORIZATION</h1>

The undersigned hereby authorizes *<br>
<span>{{$tier1Affiliateuser->name}}</span><br><br>
as its agent and attorney-in-fact ( “Agent” ) to buy and sell and otherwise deal in equities, options on
equities, commodities, commodity futures, options on commodity futures, and foreign exchange
instruments for the undersigned’ s account and risk ( “Trading” ) with good enough Ltd (TSNC).
The undersigned hereby agrees to indemnify and hold you harmless, without limitation, from all loss, cost,
indebtedness and liabilities arising therefrom including reasonable professional fees. The undersigned
specifically accepts all risks associated with Trading without limitation including but not limited to technology
risks, margin risks, sovereign risks, regulatory risks and execution risks. The undersigned further specifically
accepts all risks without limitation associated with the Agent’ s use of proprietary and/or third party Multi
Account Manager ( “MAM” ) execution/ allocation platforms designed to permit the Agent to execute
orders in a master account(s) the fills from which are automatically allocated into to multiple sub-accounts,
including my account(s)( “Account” ), connected to such master account(s), on a pro rata basis or on a per
ticket basis. I understand and agree that TSNC is not responsible for the accuracy, effectiveness or reliability
of such MAM platforms and that is my Agent’ s responsibility to manage my account and to insure that
my Account has sufficient margin to carry the positions allocated to it. I further understand and agree that
TSNC has the right to set limits on my Agents ability to manage my Account and to define the parameters
under which my Agent is authorized to manage my Account. TSNC is authorized to take any action regarding
my Account and my Agent’ s activity it deems necessary or prudent for the protection of TSNC customers a
nd its commercial relationships.<br>
In all such purchases and sales TSNC is authorized to follow the instructions of the aforesaid Agent, its
employees, sub-agents or designated third parties in every respect concerning the undersigned’ s
Account with you; and except as herein otherwise provided, the Agent is authorized to act for the undersigned
in the same manner and with the same force and effect as the undersigned might or could do with respect to
such purchases and sales as well as with respect to all other things necessary or incidental thereto, except that
the Agent is not authorized to withdraw any money, securities, or other property, either in the name of the
undersigned or otherwise.<br>
The undersigned hereby ratifies and confirms any and all transactions with you heretofore or hereafter made
by the aforesaid Agent on behalf of or for the Account of the undersigned.<br>
This authorization and indemnity is in addition to (and in no way limits or restricts) any rights which you may
have under any other agreement between you and the undersigned.<br>
This authorization and indemnity is a continuing one and shall remain in full force and effect until revoked by
the undersigned by a written noticed addressed to you, delivered to you at the above address, and acted upon
by you in the ordinary course of your business and such revocation shall not affect your liability in any way
resulting from transactions initiated prior to such revocation. This authorization and indemnity shall inure to your
benefit and that of your successors and assigns.<br>
FURTHERMORE, BY SIGNING THIS FORM, I ACKNOWLEDGE AND AGREE THAT THIS LIMITED POWER OF ATTORNEY
AUTHORIZATION AND AGREEMENT RELATES TO MY ACCOUNT(S) AND IS INCORPORATED IN AND MADE A PART
OF THE ACCOUNT AGREEMENT BETWEEN TVLTD AND ME. I ACKNOWLEDGE THAT I HAVE RECEIVED AND READ
THIS LIMITED POWER OF ATTORNEY AUTHORIZATION AND AGREEMENT AND RETAINED A COPY FOR MY RECORDS
AND THAT IT IS MY RESPONSIBILITY TO PROVIDE A COPY TO MY AGENT(S) IF I SO DESIRE.<br>
I acknowledge that I have received, read and agree to abide by the terms and conditions of this limited power of
attorney under which I will be managing account number *<br><br>

<span>{{$this_user_account_info->account_number}}</span>
at TSNC(the “Account” ).<br><br>
I agree that I am familiar with and have had the opportunity to review the use instructions for the MAM and the
physical operation of the MAM that I intend to use in connection with managing the Account, TSNC s trading rules
and the limits imposed on my activity by TSNC and I accept full responsibility for insuring that there is
sufficient margin in the Account at all times sufficient to support the position(s) allocated to the Account
prior to executing an order. I further acknowledge and agree that TSNC shall have no liability for my acts
or omissions in relation to my management of the Account and I hereby indemnify and hold<br><br>

<span>{{$this_user_account_info->email}}</span> <span>{{$this_user_account_info->name}}</span>

<form method="post" action="{{route('mam-consent-confirm')}}">
    @csrf
    <input type="submit" value="同意する" />
</form>