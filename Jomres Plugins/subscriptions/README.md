The Jomres Subscriptions plugin allows you to set up subscription packages that your property managers can subscribe to. 

Super property managers are not affected by this plugin.

With the Subscriptions plugin enabled, every non-super manager must be subscribed to a subscription package to be able to use Jomres features. If they try to do anything without a subscription they will be redirected to the List Subscription Packages page.

First visit Administrator > Jomres > Settings > Site Configuration and in the Subscriptions tab set "Use subscription handling functionality" to Yes.

Once that is done, you can then visit Administrator > Jomres > Subscriptions > Subscription Gateway Settings to save your Stripe API Keys.

You must ensure that you have configured your subscription payment gateways first, before attempting to add subscription packages. When a Subscription Package is created then the package is added to Stripe as a Product. 

Do any testing with the payment gateway in test mode first. Once you are satisfied that everything is working, then you can use the Stripe "Copy to Live Mode" feature to copy the product to live mode.

It is recommended that you create at least one subscription package that is free. You can then make more that are paid for. Free packages give property managers access to only the necessary features to manage their properties, while paid for packages can give them access to more features, such as payment gateways and optional extras.


Subscription status

* 0 Inactive
* 1 Active


Invoice Statuses

* 0 Unpaid
* 1 Paid
* 2 Cancelled
* 3 Pending


