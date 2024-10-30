## This Bot will post updates to the Telegram channel of your choice. 

It uses the webhook functionality of Jomres, parsing the webhooks and sending webhook events to Telegram. This is a useful way for you to keep track of what's happening on your site.

To use it you will need to create a new telegram bot, tell the @BotFather about it and get the API key. You will also need to create a new channel and add the bot to it.

To disable it, just remove the API key from Site Configuration.

### Create a new bot

Open the Telegram app (either desktop or mobile) and search for @BotFather. Start a new chat with it and send it the message `/newbot` and follow the instructions. You will be asked to give your bot a name and a username. The name can be anything you like, but the username must end in `bot` and be unique. For example, `MySiteBot` or `MySiteUpdatesBot`.

Once you have created the bot, the @BotFather will give you an API key. You will need this later so store it somewhere safe.

### Add the bot to a channel

### In the Telegram App

Screenshots are from the desktop app.

Open the Telegram app (either desktop or mobile) and go to your channel. 

{{01.png}}

Click on the channel name and then click on the three dots in the top right corner. 

{{02.png}}

Click on "Manage Channel" and then "Administrators".

{{03.png}}
{{04.png}}

Use the search feature to find your bot (e.g. `MySiteUpdatesBot`) and click on it. 

{{05.png}}

Click OK

{{06.png}}

Click Save

### In Jomres

Now in Jomres go to Administrator > Jomres > Settings > Site Configuration > Telegram Bot tab

Save the API token and the channel id (see next section on finding the chat id).

That's it! You're done. Now webhook events will be sent to your Telegram channel.


### Find the Chat ID

These updates will be of more interest to you than to your users, and they will expose a manager's activities so you should probably want to set the channel to Private. If you do that, then you will need to find the channel's real Chat ID. You can do that by following the instructions here:

One way way to find the channel's chat ID is to log into https://web.telegram.org and go to the channel. If you are using a desktop you will need to link your account to your phone first. 

The URL in the browser will look something like this: https://web.telegram.org/a/#-NNNNNNNNNN  your chat id will then be 100NNNNNNNNNN

When saving your chat id in Jomres, make sure you do NOT include the minus/hyphen symbol.

Source :

https://stackoverflow.com/questions/33858927/how-to-obtain-the-chat-id-of-a-private-telegram-channel

Another way : 


    You should convert it to public with some @channelName

    Send a message to this channel through the Bot API:

    https://api.telegram.org/bot111:222/sendMessage?chat_id=@channelName&text=123

    As the response, you will get information with chat_id of your channel.

    {
      "ok" : true,
      "result" : {
        "chat" : {
          **"id" : -1001005582487,**
          "title" : "Test Private Channel",
          "type" : "channel"
        },
        "date" : 1448245538,
        "message_id" : 7,
        "text" : "123ds"
      }
    }

    Now you can convert the channel back to private (by deleting the channel's link) and send a message directly to the chat_id "-1001005582487":

    https://api.telegram.org/bot111:222/sendMessage?chat_id=-1001005582487&text=123



