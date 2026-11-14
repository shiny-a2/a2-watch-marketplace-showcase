# Private photos for watch service requests — source candidate

The marketplace service form can accept optional watch photos. A prepared source update keeps new request photos in private storage and shows them to authorized repair staff through the request they are handling. If secure storage is unavailable, the request is not sent to payment with missing photos.

The candidate passed an isolated multipart upload check with 11 assertions, the service journey, 53 certificate lifecycle assertions and 334 marketplace flow assertions. These checks used synthetic data. The update has not been deployed. Before release, the team will check the live storage location and any existing requests, then verify photo display with a repair account. No customer payment or message was created for testing.
