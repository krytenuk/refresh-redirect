FwsRefreshRedirect
============

Docs available [online](https://www.freedomwebservices.net/zend-framework/fws-refresh-redirect).

I was inspired to write this simple module after using ZF flashMessanger controller plugin and view helper. The problem I found is when using the view helper the messages in flashMessanger are deleted, this means that if the user refreshes the page all messages are gone. This can possibly lead to errors depending on your code. To overcome this issue I wrote the refresh redirect module, this simply checks if the same page is called a second time, if so redirect to a different page.