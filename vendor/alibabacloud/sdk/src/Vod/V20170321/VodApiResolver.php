<?php

namespace AlibabaCloud\Vod\V20170321;

use AlibabaCloud\ApiResolverTrait;

/**
 * Find the specified Api of the Vod based on the method name as the Api name.
 *
 * @package   AlibabaCloud\Vod\V20170321
 *
 * @method AddAITemplate addAITemplate(array $options = [])
 * @method AddCategory addCategory(array $options = [])
 * @method AddEditingProject addEditingProject(array $options = [])
 * @method AddFaceRegistration addFaceRegistration(array $options = [])
 * @method AddMediaSequences addMediaSequences(array $options = [])
 * @method AddStorage addStorage(array $options = [])
 * @method AddTranscodeTemplateGroup addTranscodeTemplateGroup(array $options = [])
 * @method AddVodDomain addVodDomain(array $options = [])
 * @method AddVodTemplate addVodTemplate(array $options = [])
 * @method AddWatermark addWatermark(array $options = [])
 * @method AddWorkFlow addWorkFlow(array $options = [])
 * @method CreateAudit createAudit(array $options = [])
 * @method CreateUploadAttachedMedia createUploadAttachedMedia(array $options = [])
 * @method CreateUploadImage createUploadImage(array $options = [])
 * @method CreateUploadVideo createUploadVideo(array $options = [])
 * @method DeleteAITemplate deleteAITemplate(array $options = [])
 * @method DeleteAttachedMedia deleteAttachedMedia(array $options = [])
 * @method DeleteCategory deleteCategory(array $options = [])
 * @method DeleteEditingProject deleteEditingProject(array $options = [])
 * @method DeleteImage deleteImage(array $options = [])
 * @method DeleteMezzanines deleteMezzanines(array $options = [])
 * @method DeleteStream deleteStream(array $options = [])
 * @method DeleteTranscodeTemplateGroup deleteTranscodeTemplateGroup(array $options = [])
 * @method DeleteTranscodeTemplates deleteTranscodeTemplates(array $options = [])
 * @method DeleteVideo deleteVideo(array $options = [])
 * @method DeleteVodDomain deleteVodDomain(array $options = [])
 * @method DeleteVodTemplate deleteVodTemplate(array $options = [])
 * @method DeleteWatermark deleteWatermark(array $options = [])
 * @method DeleteWorkFlow deleteWorkFlow(array $options = [])
 * @method DescribeCdnDomainLogs describeCdnDomainLogs(array $options = [])
 * @method DescribeDomainBpsData describeDomainBpsData(array $options = [])
 * @method DescribeDomainFlowData describeDomainFlowData(array $options = [])
 * @method DescribePlayTopVideos describePlayTopVideos(array $options = [])
 * @method DescribePlayUserAvg describePlayUserAvg(array $options = [])
 * @method DescribePlayUserTotal describePlayUserTotal(array $options = [])
 * @method DescribePlayVideoStatis describePlayVideoStatis(array $options = [])
 * @method DescribeRefreshQuota describeRefreshQuota(array $options = [])
 * @method DescribeRefreshTasks describeRefreshTasks(array $options = [])
 * @method DescribeUserVodStatus describeUserVodStatus(array $options = [])
 * @method DescribeVodCertificateList describeVodCertificateList(array $options = [])
 * @method DescribeVodDomainBpsData describeVodDomainBpsData(array $options = [])
 * @method DescribeVodDomainCertificateInfo describeVodDomainCertificateInfo(array $options = [])
 * @method DescribeVodDomainConfigs describeVodDomainConfigs(array $options = [])
 * @method DescribeVodDomainDetail describeVodDomainDetail(array $options = [])
 * @method DescribeVodDomainLog describeVodDomainLog(array $options = [])
 * @method DescribeVodDomainTrafficData describeVodDomainTrafficData(array $options = [])
 * @method DescribeVodRefreshQuota describeVodRefreshQuota(array $options = [])
 * @method DescribeVodRefreshTasks describeVodRefreshTasks(array $options = [])
 * @method DescribeVodService describeVodService(array $options = [])
 * @method DescribeVodUserDomains describeVodUserDomains(array $options = [])
 * @method DescribeVodUserResourcePackage describeVodUserResourcePackage(array $options = [])
 * @method EditLiveRecordVideo editLiveRecordVideo(array $options = [])
 * @method GetAIMediaAuditJob getAIMediaAuditJob(array $options = [])
 * @method GetAITemplate getAITemplate(array $options = [])
 * @method GetAttachedMediaInfo getAttachedMediaInfo(array $options = [])
 * @method GetAuditHistory getAuditHistory(array $options = [])
 * @method GetAuditResult getAuditResult(array $options = [])
 * @method GetCDNStatisSum getCDNStatisSum(array $options = [])
 * @method GetCategories getCategories(array $options = [])
 * @method GetDefaultAITemplate getDefaultAITemplate(array $options = [])
 * @method GetEditingProject getEditingProject(array $options = [])
 * @method GetEditingProjectMaterials getEditingProjectMaterials(array $options = [])
 * @method GetFileInfo getFileInfo(array $options = [])
 * @method GetImageInfo getImageInfo(array $options = [])
 * @method GetMediaAuditResult getMediaAuditResult(array $options = [])
 * @method GetMediaAuditResultDetail getMediaAuditResultDetail(array $options = [])
 * @method GetMediaAuditResultTimeline getMediaAuditResultTimeline(array $options = [])
 * @method GetMediaDNAResult getMediaDNAResult(array $options = [])
 * @method GetMessageCallback getMessageCallback(array $options = [])
 * @method GetMezzanineInfo getMezzanineInfo(array $options = [])
 * @method GetOSSStatis getOSSStatis(array $options = [])
 * @method GetPlayInfo getPlayInfo(array $options = [])
 * @method GetTranscodeSummary getTranscodeSummary(array $options = [])
 * @method GetTranscodeTask getTranscodeTask(array $options = [])
 * @method GetTranscodeTemplateGroup getTranscodeTemplateGroup(array $options = [])
 * @method GetURLUploadInfos getURLUploadInfos(array $options = [])
 * @method GetVideoConfig getVideoConfig(array $options = [])
 * @method GetVideoInfo getVideoInfo(array $options = [])
 * @method GetVideoInfos getVideoInfos(array $options = [])
 * @method GetVideoList getVideoList(array $options = [])
 * @method GetVideoPlayAuth getVideoPlayAuth(array $options = [])
 * @method GetVideoPlayInfo getVideoPlayInfo(array $options = [])
 * @method GetVodTemplate getVodTemplate(array $options = [])
 * @method GetWatermark getWatermark(array $options = [])
 * @method GetWorkFlow getWorkFlow(array $options = [])
 * @method ListAIASRJob listAIASRJob(array $options = [])
 * @method ListAIJob listAIJob(array $options = [])
 * @method ListAITemplate listAITemplate(array $options = [])
 * @method ListAIVideoCategoryJob listAIVideoCategoryJob(array $options = [])
 * @method ListAIVideoCensorJob listAIVideoCensorJob(array $options = [])
 * @method ListAIVideoCoverJob listAIVideoCoverJob(array $options = [])
 * @method ListAIVideoPornRecogJob listAIVideoPornRecogJob(array $options = [])
 * @method ListAIVideoSummaryJob listAIVideoSummaryJob(array $options = [])
 * @method ListAIVideoTerrorismRecogJob listAIVideoTerrorismRecogJob(array $options = [])
 * @method ListAuditSecurityIp listAuditSecurityIp(array $options = [])
 * @method ListLiveRecordVideo listLiveRecordVideo(array $options = [])
 * @method ListSnapshots listSnapshots(array $options = [])
 * @method ListTranscodeTask listTranscodeTask(array $options = [])
 * @method ListTranscodeTemplateGroup listTranscodeTemplateGroup(array $options = [])
 * @method ListVodTemplate listVodTemplate(array $options = [])
 * @method ListWatermark listWatermark(array $options = [])
 * @method ListWorkFlow listWorkFlow(array $options = [])
 * @method OpenVodService openVodService(array $options = [])
 * @method PreloadVodObjectCaches preloadVodObjectCaches(array $options = [])
 * @method ProduceEditingProjectVideo produceEditingProjectVideo(array $options = [])
 * @method PushObjectCache pushObjectCache(array $options = [])
 * @method RefreshObjectCaches refreshObjectCaches(array $options = [])
 * @method RefreshUploadVideo refreshUploadVideo(array $options = [])
 * @method RefreshVodObjectCaches refreshVodObjectCaches(array $options = [])
 * @method RegisterMedia registerMedia(array $options = [])
 * @method SearchEditingProject searchEditingProject(array $options = [])
 * @method SearchMedia searchMedia(array $options = [])
 * @method SetAuditSecurityIp setAuditSecurityIp(array $options = [])
 * @method SetDefaultAITemplate setDefaultAITemplate(array $options = [])
 * @method SetDefaultTranscodeTemplateGroup setDefaultTranscodeTemplateGroup(array $options = [])
 * @method SetDefaultVodTemplate setDefaultVodTemplate(array $options = [])
 * @method SetDefaultWatermark setDefaultWatermark(array $options = [])
 * @method SetEditingProjectMaterials setEditingProjectMaterials(array $options = [])
 * @method SetMessageCallback setMessageCallback(array $options = [])
 * @method SetVodDomainCertificate setVodDomainCertificate(array $options = [])
 * @method StartVodDomain startVodDomain(array $options = [])
 * @method StopVodDomain stopVodDomain(array $options = [])
 * @method SubmitAIASRJob submitAIASRJob(array $options = [])
 * @method SubmitAIJob submitAIJob(array $options = [])
 * @method SubmitAIMediaAuditJob submitAIMediaAuditJob(array $options = [])
 * @method SubmitAIVideoCategoryJob submitAIVideoCategoryJob(array $options = [])
 * @method SubmitAIVideoCensorJob submitAIVideoCensorJob(array $options = [])
 * @method SubmitAIVideoCoverJob submitAIVideoCoverJob(array $options = [])
 * @method SubmitAIVideoPornRecogJob submitAIVideoPornRecogJob(array $options = [])
 * @method SubmitAIVideoSummaryJob submitAIVideoSummaryJob(array $options = [])
 * @method SubmitAIVideoTerrorismRecogJob submitAIVideoTerrorismRecogJob(array $options = [])
 * @method SubmitPreprocessJobs submitPreprocessJobs(array $options = [])
 * @method SubmitSnapshotJob submitSnapshotJob(array $options = [])
 * @method SubmitTranscodeJobs submitTranscodeJobs(array $options = [])
 * @method UpdateAITemplate updateAITemplate(array $options = [])
 * @method UpdateAttachedMediaInfos updateAttachedMediaInfos(array $options = [])
 * @method UpdateCategory updateCategory(array $options = [])
 * @method UpdateEditingProject updateEditingProject(array $options = [])
 * @method UpdateImageInfos updateImageInfos(array $options = [])
 * @method UpdateTranscodeTemplateGroup updateTranscodeTemplateGroup(array $options = [])
 * @method UpdateVideoInfo updateVideoInfo(array $options = [])
 * @method UpdateVideoInfos updateVideoInfos(array $options = [])
 * @method UpdateVodTemplate updateVodTemplate(array $options = [])
 * @method UpdateWatermark updateWatermark(array $options = [])
 * @method UpdateWorkFlow updateWorkFlow(array $options = [])
 * @method UploadMediaByURL uploadMediaByURL(array $options = [])
 */
class VodApiResolver
{
    use ApiResolverTrait;
}
