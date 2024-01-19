let lastAuthor = '';
$.each(messages, function (index, value) {
	let singleMessage = document.createElement("div");
	singleMessage.classList.add("singleMessage");

	let messageAvatarDiv = document.createElement("div");
	messageAvatarDiv.classList.add("messageAvatarDiv");

    if (lastAuthor != value.author_full) {
        let messageAvatar = document.createElement("div");
        messageAvatar.classList.add("messageAvatar");
        messageAvatar.innerText = value.initials;
        messageAvatarDiv.append(messageAvatar);
    }

	singleMessage.append(messageAvatarDiv);

	let messageContainer = document.createElement("div");
	messageContainer.classList.add("messageContainer");

    if (lastAuthor != value.author_full) {
        let authorMessage = document.createElement("div");
        authorMessage.classList.add("authorMessage");
        authorMessage.innerText = value.author_full;
        messageContainer.append(authorMessage);
    }

    lastAuthor = value.author_full;

	let messageContent = document.createElement("div");
	messageContent.classList.add("messageContent");
	messageContent.innerText = value.content;
	messageContainer.append(messageContent);

	let messageFooter = document.createElement("div");
	messageFooter.classList.add('messageFooter');

	let messageType = document.createElement("div");
	messageType.classList.add("messageType");
	messageType.innerText = value.message_type;
	messageFooter.append(messageType);

	let messageCreatedDate = document.createElement("div");
	messageCreatedDate.classList.add("messageCreatedDate");
	messageCreatedDate.innerText = value.createDate;
	messageFooter.append(messageCreatedDate);

	messageContainer.append(messageFooter);

	singleMessage.append(messageContainer);

	$("#chatList").append(singleMessage);
});
