<template>
    <ul class="chat">
        <li class="left clearfix">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        <!-- {{ message.user.name }}ß -->
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages']
  };
</script>
