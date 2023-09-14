document.addEventListener('DOMContentLoaded', function () {
    const followButton = document.getElementById('followButton');

    const userId = followButton.getAttribute('user-id');
    let status = followButton.getAttribute('follows') === 'true';

    function toggleFollow() {
        axios.post('/follow/' + userId)
            .then(response => {
                status = !status;
                updateButtonText();
                updateButtonStyle();
                console.log(response.data);
            })
            .catch(errors => {
                if (errors.response.status == 401) {
                    window.location = '/login';
                }
            });
    }

    function updateButtonText() {
        followButton.textContent = status ? 'Following' : 'Follow';
    }

    function updateButtonStyle() {
        if (status) {
            followButton.classList.add('following-button');
        } else {
            followButton.classList.remove('following-button');
        }
    }

    followButton.addEventListener('click', toggleFollow);

    // Initial button text and style
    updateButtonText();
    updateButtonStyle();
});