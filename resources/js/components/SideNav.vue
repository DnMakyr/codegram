<script setup>
import SideNavLink from "./SideNavLink.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <nav id="sidebarMenu" class="sidebar">
        <div class="position-sticky">
            <div id="icon" class="flex">
                <img
                    src="/svg/codegram.svg"
                    alt="logo"
                    style="height: 45px; border-right: 1px solid #000000"
                    class="pe-2"
                />

                <div
                    class="ps-2 pt-1"
                    style="font-size: 20px; font-weight: bold"
                >
                    CodeGram
                </div>
            </div>

            <SideNavLink
                :src="'/icons/home.png'"
                :href="'/dashboard'"
                :class="'me-3'"
                >Home</SideNavLink
            >

            <SideNavLink src="/icons/direction.png" href="/explore" class="me-3"
                >Explore</SideNavLink
            >

            <SideNavLink
                :src="'/icons/search.png'"
                :href="'/search'"
                :class="'me-3'"
                >Search</SideNavLink
            >

            <SideNavLink
                :src="'/icons/message.png'"
                :href="'/chat'"
                :class="'me-3'"
                >Chat</SideNavLink
            >

            <SideNavLink
                :src="'/icons/heart.png'"
                :href="'/notification'"
                :class="'me-3'"
                >Notification</SideNavLink
            >

            <SideNavLink
                :src="'/icons/create.png'"
                :href="'/create'"
                :class="'me-3'"
                >Create</SideNavLink
            >

            <SideNavLink
                :src="$page.props.auth.profileImage"
                :href="route('profile.show', $page.props.auth.user.id)"
                :style="'height: 24px; width: 24px; object-fit: cover'"
                :class="'rounded-full me-3'"
                >Profile</SideNavLink
            >
            <SideNavLink
                :src="'/icons/logout.png'"
                :href="route('logout')"
                :class="'me-3'"
                method="post"
            >
                Logout
            </SideNavLink>
        </div>
    </nav>
</template>

<style scoped>
@media (min-width: 991.98px) {
    main {
        padding-left: 240px;
    }
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 20px 0 0; /* Height of navbar */
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    padding-right: 20px;
    width: moz-fit-content;
    z-index: 600;
    background-color: #f8fafc;
}

@media (max-width: 991.98px) {
    .sidebar {
        width: 100%;
    }
}
.sidebar .active {
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: 0.5rem;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

#sidebarMenu {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
}

#icon {
    margin: 30px 0px 30px 16px;
}

/* .nav-auth a {
    text-decoration: none;
    font-size: 16px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
} */
.nav-auth#logout {
    position: fixed;
    bottom: 0;
    margin-bottom: 20px;
}
/* .nav-link {
    display: flex; 
    align-items: center;
} */
span.notification-count {
    margin-left: 7px;
    padding: 0px 2px;
    border-radius: 2px;
    background-color: #c73947d7;
    color: white;
    font-weight: bold;
}

/* Style for the new notification sidebar */
#notificationSidebar {
    position: fixed;
    top: 0;
    padding-left: 10px;
    padding-top: 57px;
    padding-right: 10px;
    left: 210px; /* Adjust the position to place it next to the main sidebar */
    width: 250px; /* Adjust the width as needed */
    height: 100%;
    background-color: #fff; /* Set the background color as desired */
    z-index: 998; /* Ensure it's above other content but behind the main sidebar */
    /* transition: left 0.3s ease-in-out; */
    transition: width 2s;
    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.327); /* Add shadow if needed */
}
#notificationSidebar div.card:hover {
    transform: scale(1.05);
    transition: 0.5s;
}

/* Style for the button that opens the notification sidebar */
#openNotifications {
    cursor: pointer;
}

/* Adjust the position of the button as needed */
.isActive {
    font-weight: bold !important;
    color: rgb(212, 65, 65) !important;
    border-style: initial;
    border-radius: 5px;
}
</style>
