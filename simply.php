<!-- Add this HTML in index.php -->
<div class="modal fade" id="movieDetailsModal" tabindex="-1" aria-labelledby="movieDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieDetailsModalLabel">Movie Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="movieDetailsContent">
                <!-- Content will be loaded here with AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and AJAX functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
function showDetails(movie_id) {
    const modalContent = document.getElementById('movieDetailsContent');
    modalContent.innerHTML = '<p>Loading...</p>'; // Loading message

    // Fetch movie details using AJAX
    fetch(`details.php?movie_id=${movie_id}`)
        .then(response => response.text())
        .then(data => {
            modalContent.innerHTML = data; // Load the fetched content into modal
            const myModal = new bootstrap.Modal(document.getElementById('movieDetailsModal'));
            myModal.show();
        })
        .catch(error => {
            modalContent.innerHTML = '<p>Error loading details.</p>';
            console.error("Error fetching details:", error);
        });
}
</script>

<!-- Sample Button to trigger the modal (replace with your PHP loop for each movie row) -->
<button class="btn btn-warning" onclick="showDetails(1)">View Details</button>
