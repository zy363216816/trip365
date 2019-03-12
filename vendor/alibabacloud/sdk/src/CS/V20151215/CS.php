<?php

namespace AlibabaCloud\CS\V20151215;

use AlibabaCloud\ApiResolverTrait;

/**
 * Find the specified Api of the CS based on the method name as the Api name.
 *
 * @package   AlibabaCloud\CS\V20151215
 *
 * @method static AttachInstances attachInstances(array $options = [])
 * @method static BatchUpdateSharedService batchUpdateSharedService(array $options = [])
 * @method static BindSLB bindSLB(array $options = [])
 * @method static CSApiResolver cSApiResolver(array $options = [])
 * @method static CheckAliyunCSServiceRole checkAliyunCSServiceRole(array $options = [])
 * @method static CheckSecurityGroup checkSecurityGroup(array $options = [])
 * @method static CleanUpControllerEvent cleanUpControllerEvent(array $options = [])
 * @method static CleanUpETCD cleanUpETCD(array $options = [])
 * @method static CreateAutoScale createAutoScale(array $options = [])
 * @method static CreateCluster createCluster(array $options = [])
 * @method static CreateMonitoringUser createMonitoringUser(array $options = [])
 * @method static CreateTrigger createTrigger(array $options = [])
 * @method static CreateTriggerHook createTriggerHook(array $options = [])
 * @method static DeleteAutoScale deleteAutoScale(array $options = [])
 * @method static DeleteCluster deleteCluster(array $options = [])
 * @method static DeleteClusterNode deleteClusterNode(array $options = [])
 * @method static DeleteTrigger deleteTrigger(array $options = [])
 * @method static DeployEMLSolution deployEMLSolution(array $options = [])
 * @method static DeploySharedService deploySharedService(array $options = [])
 * @method static DescribeAgentVersions describeAgentVersions(array $options = [])
 * @method static DescribeApiVersion describeApiVersion(array $options = [])
 * @method static DescribeClusterAutoScale describeClusterAutoScale(array $options = [])
 * @method static DescribeClusterCRL describeClusterCRL(array $options = [])
 * @method static DescribeClusterCerts describeClusterCerts(array $options = [])
 * @method static DescribeClusterDetail describeClusterDetail(array $options = [])
 * @method static DescribeClusterEndpoint describeClusterEndpoint(array $options = [])
 * @method static DescribeClusterEndpoints describeClusterEndpoints(array $options = [])
 * @method static DescribeClusterExtInfo describeClusterExtInfo(array $options = [])
 * @method static DescribeClusterLogs describeClusterLogs(array $options = [])
 * @method static DescribeClusterNodes describeClusterNodes(array $options = [])
 * @method static DescribeClusterSharedServices describeClusterSharedServices(array $options = [])
 * @method static DescribeClusterSnapshots describeClusterSnapshots(array $options = [])
 * @method static DescribeClusterStatus describeClusterStatus(array $options = [])
 * @method static DescribeClusterUserKubeconfig describeClusterUserKubeconfig(array $options = [])
 * @method static DescribeClusterVxlanPortRule describeClusterVxlanPortRule(array $options = [])
 * @method static DescribeClusters describeClusters(array $options = [])
 * @method static DescribeRamUsers describeRamUsers(array $options = [])
 * @method static DescribeRegionImages describeRegionImages(array $options = [])
 * @method static DescribeRegionSharedServices describeRegionSharedServices(array $options = [])
 * @method static DescribeTrigger describeTrigger(array $options = [])
 * @method static DescribeTriggerHookStatus describeTriggerHookStatus(array $options = [])
 * @method static DescribeUserInstances describeUserInstances(array $options = [])
 * @method static DescribeUserIoOptimizedInstances describeUserIoOptimizedInstances(array $options = [])
 * @method static DescribeUserQuota describeUserQuota(array $options = [])
 * @method static DescribeUserResourceDomain describeUserResourceDomain(array $options = [])
 * @method static DescribeUserResources describeUserResources(array $options = [])
 * @method static DescribeUserServices describeUserServices(array $options = [])
 * @method static DescribeVxlanPortsRules describeVxlanPortsRules(array $options = [])
 * @method static DownloadClusterNodeCerts downloadClusterNodeCerts(array $options = [])
 * @method static FixSecurityGroup fixSecurityGroup(array $options = [])
 * @method static LoginAliyunHub loginAliyunHub(array $options = [])
 * @method static ProbeTriggerHook probeTriggerHook(array $options = [])
 * @method static PushMonitoringData pushMonitoringData(array $options = [])
 * @method static ReDeploySharedService reDeploySharedService(array $options = [])
 * @method static RecoverController recoverController(array $options = [])
 * @method static RecoverControllers recoverControllers(array $options = [])
 * @method static ResetClusterNode resetClusterNode(array $options = [])
 * @method static RevokeClusterCerts revokeClusterCerts(array $options = [])
 * @method static RevokeClusterToken revokeClusterToken(array $options = [])
 * @method static RevokeTrigger revokeTrigger(array $options = [])
 * @method static RevokeTriggerHook revokeTriggerHook(array $options = [])
 * @method static ScaleCluster scaleCluster(array $options = [])
 * @method static UnBindSLB unBindSLB(array $options = [])
 * @method static UpdateAutoScale updateAutoScale(array $options = [])
 * @method static UpdateClusterAgentVersion updateClusterAgentVersion(array $options = [])
 * @method static UpdateClusterDockerVersion updateClusterDockerVersion(array $options = [])
 * @method static UpdateClusterKubenetesVersion updateClusterKubenetesVersion(array $options = [])
 * @method static UpdateController updateController(array $options = [])
 * @method static UpdateControllers updateControllers(array $options = [])
 * @method static UpdateRamPolicy updateRamPolicy(array $options = [])
 * @method static UpdateSharedService updateSharedService(array $options = [])
 * @method static UpdateSharedServices updateSharedServices(array $options = [])
 * @method static UpgradeClusterAgent upgradeClusterAgent(array $options = [])
 */
class CS
{
    use ApiResolverTrait;
}
