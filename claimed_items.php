<?php
include('header_admin.php');
include('session.php');
include('new_navbar.php');
include('dbcons.php');
?>

<br>
<div class="container">
    <div class="margin-top">
        <div class="row">   
            <div class="span12">        
                <div class="alert alert-info"><strong>Claimed Items</strong></div>
                <div class="pull-right">
                    <a href="" onclick="window.print()" class="btn btn2 btn-info"><i class="icon-print icon-large"></i> Print</a>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                    <thead>
                        <tr>
                            <th>Lost Item Title</th>                                 
                            <th>Found By</th>                                 
                            <th>Date Found</th>                                 
                            <th>Description</th>                                 
                            <th>Claimed By</th>
                            <th>Year Level</th> 
                            <th>Course/Strand</th>                                  
                            <th>Date Claimed</th>
                            <th>Released By</th>
                            <th>Proof of Turnovers</th> <!-- Added new column header -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch claimed items along with the admin's name and proof of claim
                        $claimed_query = $conn->query("
                            SELECT ci.*, u.firstname, u.lastname 
                            FROM claimed_items ci 
                            LEFT JOIN users u ON ci.approved_by = u.user_id 
                            ORDER BY ci.claim_date DESC
                        ");
                        while ($row = $claimed_query->fetch_assoc()) {
                            $proof_claim = $row['proof_claim']; // Fetch the proof_claim column
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['lostitem_title']); ?></td>
                                <td><?php echo htmlspecialchars($row['founder']); ?></td>
                                <td><?php echo htmlspecialchars($row['datefound']); ?></td>
                                <td><?php echo htmlspecialchars($row['description']); ?></td>
                                <td><?php echo htmlspecialchars($row['claimer_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['claim_yearlevel']); ?></td>
                                <td><?php echo htmlspecialchars($row['claim_strand']); ?></td>
                                <td><?php echo date('m-d-y h:i A', strtotime($row['claim_date'])); ?></td>
                                <td><?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></td> <!-- Show the admin's name -->

                                <!-- Display Proof of Turnovers (proof_claim) -->
                                <td>
                                    <?php if (!empty($proof_claim)): ?>
                                        <a href="uploads/proofs_claim/<?php echo $proof_claim; ?>" target="_blank">
                                            <img src="uploads/proofs_claim/<?php echo $proof_claim; ?>" alt="Proof of Turnover" style="width: 120px;">
                                        </a>
                                    <?php else: ?>
                                        No proof available
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>      
        </div>
    </div>
</div>
